<?php
namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;


readonly class RepasModel {

    /**
     * @param string $gerant
     * @param string $dates
 */
    public function __construct(
        public int    $idRepas,
        public int    $idLieu,
        public string $gerant,
        public string $dates)
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
        $tousLesRepas =[];
        foreach($result as $repas){
            $repasmodel=new self(
                idRepas: $repas['Id_repas'],
                idLieu: $repas['Id_Lieu'],
                gerant: $repas['Gerant'],
                dates: $repas['Dates']

            );
            $tousLesRepas[]=$repasmodel;
        }
        return $tousLesRepas;
    }

    public static function unSeulRepas(DbConnect $dbConnect, int $idRepas): self
    {
        $sql = "
        SELECT Repas.*
        FROM Repas WHERE Id_repas = ?";
        $stmt = $dbConnect->mysqli()->prepare($sql);

        $stmt->bind_param("s", $idRepas);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        return new self(
            idRepas: $row['Id_repas'],
            idLieu: $row['Id_Lieu'],
            gerant: $row['Gerant'],
            dates: $row['Dates']);
    }

    public function getLieu(DbConnect $dbConnect): string {
    $sql = "
        SELECT Lieu.Adresse
        FROM Repas,Lieu
        WHERE Repas.Id_Lieu = Lieu.Id_Lieu AND Lieu.Id_Lieu = ?
    ";
        $stmt = $dbConnect->mysqli()->prepare($sql);

        $idlieu= $this->idLieu;
        $stmt->bind_param("s", $idlieu);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        return $row['Adresse'] ;

}

    public static function Verifdate(DbConnect $dbConnect) : bool
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
