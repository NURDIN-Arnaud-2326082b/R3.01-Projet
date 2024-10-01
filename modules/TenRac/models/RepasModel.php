<?php
namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;


readonly class RepasModel {

    /**
     * @param string $gerant
     * @param string $dates
 */
    public function __construct(private DbConnect $connect)
    {

    }

    public function ajoutRepas($Dates, $Gerant, $id_lieu): void
    {
        // SQL query to check if the Gerant is a Chevalier or Dame
        $sql1 = "SELECT Nom FROM Tenrac
             WHERE GRADE IN ('Chevalier', 'Dame','Grand Chevalier')
             AND Nom = ?";

        $stmt = $this->connect->mysqli()->prepare($sql1);
        $stmt->bind_param("s",$Gerant);

        if (!$stmt) {
            die("Erreur de préparation de la requête: " . $this->connect->mysqli()->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // SQL query to insert a new Repas
            $sql = "INSERT INTO Repas (Dates, Gerant, Id_Lieu) VALUES (?, ?, ?)";
            $stmt = $this->connect->mysqli()->prepare($sql);

            if (!$stmt) {
                die("Erreur de préparation de la requête: " . $this->connect->mysqli()->error);
            }

            $stmt->bind_param("ssi", $Dates, $Gerant, $id_lieu);

            if ($stmt->execute()) {
                echo "Ajout réussi";
            } else {
                echo "Erreur lors de l'ajout: " . $stmt->error;
            }



        } else {
            echo "Le gérant n'est pas Chevalier ou Dame";
        }

        $stmt->close();

    }



    /**
     * @param DbConnect $dbConnect
     * @return self[]
     */
    public function listTousLesRepas(): array
    {
        $stmt = $this->connect->mysqli()->query("SELECT Nom_plat FROM Plat JOIN Est_dans ON Plat.Id_plat = Est_dans.Id_plat JOIN Repas ON Est_dans.Id_repas = Repas.Id_repas ORDER BY Dates");

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

    public function getLieu(): string {
    $sql = "
        SELECT Lieu.Adresse
        FROM Repas,Lieu
        WHERE Repas.Id_Lieu = Lieu.Id_Lieu ";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        return $row['Adresse'] ;

}

    public function Verifdate() : bool
    {
        $dateJour = date("Y-m-d");

        $sql = "SELECT COUNT(*) as count FROM Repas WHERE Dates = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);

        $stmt->bind_param("s", $dateJour);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        // echo "Date recherchée : " . $dateJour . "<br>";
        // echo "Nombre de résultats : " . $row['count'] . "<br>";


        if ($row['count'] > 0) {
            return true;
        } else {
            return false;
        }


    }
}
?>
