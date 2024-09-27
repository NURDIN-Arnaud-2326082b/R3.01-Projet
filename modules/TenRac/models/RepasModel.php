<?php
namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;

class RepasModel {
    protected $connect;

    public function __construct($dbConnection)
    {
        $this->connect = $dbConnection->mysqli();
    }

    public function getLieu($idLieu,$mysqli): bool {

        $sql = "
        SELECT Lieu.Adresse
        FROM Repas
        JOIN Lieu ON Repas.Id_Lieu = Lieu.Id_Lieu
        WHERE Repas.Id_Lieu = :idLieu
    ";

    // Exécution de la requête préparée
    $stmt = $mysqli->prepare($sql);
    $stmt->execute(['idLieu' => $idLieu]);
    $result = $stmt->fetch();
        $idLieu = 1; // Exemple d'ID du lieu à vérifier
        echo getLieu($idLieu);
    // Vérification et affichage du résultat
    if ($result) {
        return $result['Adresse'];
    } else {
        return "Aucune adresse trouvée pour cet Id_Lieu.";
    }




}



    public function Verifdate() : bool
    {
        $dateJour = date("Y-m-d");

        $sql = "SELECT COUNT(*) as count FROM Repas WHERE Dates = ?";
        $stmt = $this->connect->prepare($sql);

        $stmt->bind_param("s", $dateJour);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        echo "Date recherchée : " . $dateJour . "<br>";
        echo "Nombre de résultats : " . $row['count'] . "<br>";


        if ($row['count'] > 0) {
            return true;
        }
        else{
            return false;
        }


}

}
?>
