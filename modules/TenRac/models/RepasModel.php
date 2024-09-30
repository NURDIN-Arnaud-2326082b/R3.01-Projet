<?php
namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;

class RepasModel
{

    /**
     * @param int $id_Repas
     * @param int $id_Lieu
     * @param int $id_Plat
     * @param string $gerant
     * @param string $dates
     * @param string $courriel
     */
    public function __construct(
        public readonly int    $idRepas,
        public readonly int    $idLieu,
        public readonly int    $idPlat,
        public readonly int    $nom_plat,
        public readonly string $gerant,
        public readonly string $img,
        public readonly string $dates,
        public readonly string $courriel)
    {

    }

    public function ajoutRepas($Dates, $Gerant, $id_lieu): void
    {
        $sql = "FROM REPAS JOIN TENRAC ON Gerant = Nom
        WHERE GRADE = 'Chevalier' OR GRADE = 'Dame' OR GRADE = 'Grand Chevalier'";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->execute();
        // TODO
        $sql = "INSERT INTO Tenrac ( Dates , Gerant, Id_Lieu) VALUES (?, ?, ?)";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param("ssi", $Dates, $Gerant, $id_lieu);

        if ($stmt->execute()) {
            echo "Ajout réussi";
        } else {
            echo "Erreur lors de l'ajout: " . $stmt->error;
        }

        $stmt->close();
    }


    /**
     * @param DbConnect $dbConnect
     * @return self[]
     */
    public static function tousLesRepas(DbConnect $dbConnect): array
    {
        $sql = "
        SELECT Repas.*
        FROM Repas";
        $stmt = $dbConnect->mysqli()->prepare($sql);

        $stmt->execute();
        $result = $stmt->get_result();
        $tousLesRepas = [];
        foreach ($result as $repas) {
            $repasmodel = new self(
                idRepas: $repas['Id_repas'],
                idLieu: $repas['Id_Lieu'],
                gerant: $repas['Gerant'],
                dates: $repas['Dates'],
                courriel: $repas['Courriel'],
                idPlat: $repas['Id_Plat'],
                img: $repas['IMG'],
                nom_plat: $repas['Nom_plat']

            );
            $tousLesRepas[] = $repasmodel;
        }
        return $tousLesRepas;
    }

    public static function unSeulRepas(DbConnect $dbConnect, int $idRepas, int $idPlat): self
    {
        $sql = "
        SELECT Repas.*, Plat.*
        FROM Repas,Plat,Est_dans WHERE  Repas.Id_repas = Est_dans.Id_repas
    AND Est_dans.Id_Plat = Plat.Id_Plat
    AND Plat.Id_Plat = ? AND Repas.Id_repas = ?";
        $stmt = $dbConnect->mysqli()->prepare($sql);

        $stmt->bind_param("ss", $idRepas, $idPlat);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        $repasmodel = new self(
            idRepas: $row['Id_repas'],
            idLieu: $row['Id_Lieu'],
            gerant: $row['Gerant'],
            dates: $row['Dates'],
            courriel: $row['Courriel'],
            idPlat: $row['Id_Plat'],
            img: $row['IMG'],
            nom_plat: $row['Nom_plat']

        );

        return $repasmodel;
    }

    public function getPlat(DbConnect $dbConnect): string
    {
        $sql = "
        SELECT Plat.Id_Plat
        FROM Repas,Plat,Est_dans
        WHERE Repas.Id_repas = Est_dans.Id_repas 
        AND Est_dans.Id_Plat = Plat.Id_Plat 
        AND Plat.Id_Plat = ?
    ";
        $stmt = $dbConnect->mysqli()->prepare($sql);


        $stmt->bind_param("s", $idPlat);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['Nom_plat'];

    }

    public function getLieu(DbConnect $dbConnect): string
    {
        $sql = "
        SELECT Lieu.Adresse
        FROM Repas,Lieu
        WHERE Repas.Id_Lieu = Lieu.Id_Lieu AND Lieu.Id_Lieu = ?
    ";
        $stmt = $dbConnect->mysqli()->prepare($sql);

        $idlieu = $this->idLieu;
        $stmt->bind_param("s", $idlieu);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        return $row['Adresse'];

    }

    public static function Verifdate(DbConnect $dbConnect): bool
    {
        $dateJour = date("Y-m-d");

        $sql = "SELECT COUNT(*) as count FROM Repas WHERE Dates = ?";
        $stmt = $dbConnect->mysqli()->prepare($sql);

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