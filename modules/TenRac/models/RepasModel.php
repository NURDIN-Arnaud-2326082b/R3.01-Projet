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

    public function getLieu($id_repas) {

        $sql = "SELECT Lieu.Adresse FROM Repas  
            JOIN Lieu ON Repas.Id_Lieu = Lieu.Id_Lieu 
            WHERE Repas.Id_Lieu = ?";

        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param('i', $id_repas);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        if ($result->num_rows > 0) {
            return $row['Adresse'];
        } else {
            return false;
        }
    }

    public function Verifdate() : bool
    {
        $dateJour = date("Y-m-d");

        $sql = "SELECT COUNT(*) as count FROM Repas WHERE Dates = ?";
        $stmt = $this->connect->prepare($sql);
        if (!$stmt) {
            echo "Erreur de préparation : " . $this->connect->error;
            return false;
        }
        $stmt->bind_param("s", $dateJour);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();



        if ($row['count'] < 0) {
        return true;
    } else {
        return false;
    }

    }

}
?>
