<?php
namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;


/**
 * Class RepasModel
 *
 * Cette classe gère les opérations liées aux repas (Repas) dans l'application TenRac.
 */
class RepasModel {

    /**
     * Constructeur pour RepasModel.
     *
     * @param DbConnect $connect Objet de connexion à la base de données.
     */
    public function __construct(private DbConnect $connect)
    {

    }


    /**
     * Vérifie si le gérant donné a le grade requis.
     *
     * @param string $Gerant Le nom du gérant à vérifier.
     * @return bool True si le gérant a le grade requis, false sinon.
     */
    private function verificationGerant($Gerant): bool
    {
        $sql1 = "SELECT Nom FROM Tenrac WHERE GRADE IN ('Chevalier', 'Dame','Grand Chevalier') AND Nom = ?";
        $stmt = $this->connect->mysqli()->prepare($sql1);
        $stmt->bind_param("s", $Gerant);

        if (!$stmt) {
            die("Erreur de préparation de la requête: " . $this->connect->mysqli()->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result->num_rows > 0;
    }

    /**
     * Récupère l'ID d'un repas (Repas) en fonction de la date, du gérant et de l'adresse donnés.
     *
     * @param string $Dates La date du repas.
     * @param string $Gerant Le gérant du repas.
     * @param string $Adresse L'adresse du repas.
     * @return int|null L'ID du repas si trouvé, null sinon.
     */
    private function getRepasId($Dates, $Gerant, $Adresse): ?int
    {
        $requeteComparaison = "SELECT Id_Repas FROM Repas INNER JOIN Lieu ON Lieu.Id_Lieu = Repas.Id_Lieu WHERE Dates = ? AND Gerant = ? AND Lieu.Adresse = ?";
        $stmt = $this->connect->mysqli()->prepare($requeteComparaison);
        $stmt->bind_param("ssi", $Dates, $Gerant, $Adresse);

        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête: " . $this->connect->mysqli()->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Id_Repas'];
        }

        return null;
    }

    /**
     * Insère un nouveau repas (Repas) dans la base de données.
     *
     * @param string $Dates La date du repas.
     * @param string $Gerant Le gérant du repas.
     * @param string $Adresse L'adresse du repas.
     * @return int L'ID du repas nouvellement inséré.
     */
    private function insertionRepas($Dates, $Gerant, $Adresse): int
    {
        $Id_Lieu = $this->interactionLieu($Adresse);

        $sql = "INSERT INTO Repas (Dates, Gerant, Id_Lieu) VALUES (?, ?, ?)";
        $stmt = $this->connect->mysqli()->prepare($sql);

        if (!$stmt) {
            die("Erreur de préparation de la requête: " . $this->connect->mysqli()->error);
        }

        $stmt->bind_param("ssi", $Dates, $Gerant, $Id_Lieu);
        if ($stmt->execute()) {
            $Id_Repas = $stmt->insert_id;
            $stmt->close();
            return $Id_Repas;
        } else {
            die("Erreur lors de l'ajout du repas: " . $stmt->error);
        }
    }

    /**
     * Gère l'interaction avec la table des lieux (Lieu).
     *
     * @param string $Adresse L'adresse à interagir avec.
     * @return int L'ID du lieu.
     */
    private function interactionLieu($Adresse): int
    {
        $requeteLieu = "SELECT Id_Lieu FROM Lieu WHERE Adresse = ?";
        $stmt = $this->connect->mysqli()->prepare($requeteLieu);
        $stmt->bind_param("s", $Adresse);

        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête: " . $this->connect->mysqli()->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        // Si le lieu existe déjà on retourne son ID
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["Id_Lieu"];
        // Sinon on l'ajoute et on retourne son ID
        } else {
            $requeteInsertLieu = "INSERT INTO Lieu(Adresse) VALUES(?)";
            $stmt = $this->connect->mysqli()->prepare($requeteInsertLieu);
            $stmt->bind_param("s", $Adresse);

            if ($stmt->execute()) {
                $Id_Lieu = $stmt->insert_id;
                $stmt->close();
                return $Id_Lieu;
            } else {
                die("Erreur lors de l'insertion du lieu: " . $stmt->error);
            }
        }
    }

    /**
     * Ajoute un plat (Plat) à un repas (Repas).
     *
     * @param int $Id_Repas L'ID du repas.
     * @param string $Plat Le nom du plat à ajouter.
     */
    private function ajouterPlatAuRepas($Id_Repas, $Plat): void
    {
        $requetePlat = "SELECT Id_Plat FROM Plat WHERE Nom_Plat = ?";
        $stmt = $this->connect->mysqli()->prepare($requetePlat);
        $stmt->bind_param("s", $Plat);

        if (!$stmt) {
            die("Erreur lors de la préparation de la requête pour le plat: " . $this->connect->mysqli()->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            $rowPlat = $result->fetch_assoc();
            $Id_Plat = $rowPlat['Id_Plat'];

            $requeteEstDans = "INSERT INTO Est_dans (Id_Repas, Id_Plat) VALUES (?, ?)";
            $stmt = $this->connect->mysqli()->prepare($requeteEstDans);
            $stmt->bind_param("ii", $Id_Repas, $Id_Plat);

            if ($stmt->execute()) {
               header("Location: /repasTenrac");
            } else {
                echo "Erreur lors de l'ajout dans Est_dans: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Aucun plat trouvé pour associer au repas.";
        }
    }

    /**
     * Ajoute un repas (Repas) avec les détails donnés.
     *
     * @param string $Dates La date du repas.
     * @param string $Gerant Le gérant du repas.
     * @param string $Adresse L'adresse du repas.
     * @param string $Plat Le nom du plat à ajouter au repas.
     */
    public function ajoutRepas($Dates, $Gerant, $Adresse, $Plat): void
    {
        // Verification du grade du gérant
        if ($this->verificationGerant($Gerant)) {
            // Vérification de l'existence du repas
            $Id_Repas = $this->getRepasId($Dates, $Gerant, $Adresse);

            // Si le repas n'existe pas, on l'ajoute
            if (!$Id_Repas) {
                $Id_Repas = $this->insertionRepas($Dates, $Gerant, $Adresse);
            }
            // Ajout du plat au repas
            $this->ajouterPlatAuRepas($Id_Repas, $Plat);
        } else {
            echo "Le gérant n'est pas Chevalier ou Dame.";
        }
    }




    /**
     * Liste tous les repas (Repas) pour la date actuelle.
     *
     * @return array Un tableau de repas.
     */
    public function listTousLesRepas(): array
    {
        $stmt = $this->connect->mysqli()->query("SELECT Nom_plat FROM Plat JOIN Est_dans ON Plat.Id_plat = Est_dans.Id_plat JOIN Repas ON Est_dans.Id_repas = Repas.Id_repas WHERE Dates = CURRENT_DATE() ");

        // Vérification du résultat
        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        // Extraction des résultats sous forme de tableau
        $data = [];
        while ($row = $stmt->fetch_assoc()) {
            $data[] = $row;
        }

        // Libération du résultat
        $stmt->free();
        return $data;

    }

    /**
     * Récupère l'adresse du lieu (Lieu) pour un repas (Repas).
     *
     * @return string L'adresse du lieu.
     */
    public function getLieu(): string {
    $sql = "SELECT Adresse FROM Lieu JOIN Repas ON Lieu.Id_Lieu = Repas.Id_Lieu WHERE Dates = CURRENT_DATE()";
        $stmt = $this->connect->mysqli()->prepare($sql);

        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }


        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($result->num_rows > 0) {
            return $row['Adresse'] ;
        }
        return "";

}

    /**
     * Vérifie s'il y a un repas (Repas) pour la date actuelle.
     *
     * @return bool True s'il y a un repas pour la date actuelle, false sinon.
     */
    public function Verifdate() : bool
    {
        $dateJour = date("Y-m-d");

        $sql = "SELECT COUNT(*) as count FROM Repas WHERE Dates = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param("s", $dateJour);

        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        // Si le repas existe pour la date actuelle on retourne true
        if ($row['count'] > 0) {
            return true;
        } else {
            return false;
        }


    }
}
?>
