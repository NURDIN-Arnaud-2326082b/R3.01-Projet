<?php
namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;

class RepasModel {
    protected $conn;

    public function __construct(private DbConnect $connect){}

    public function getLieu($id_repas) {
        $stmt = $this->conn->prepare('SELECT Id_Lieu FROM Repas WHERE Id_repas = ?');
        $stmt->bind_param('i', $id_repas);
        $stmt->execute();
        $resultat = $stmt->get_result()->fetch_assoc();

        return $resultat ? $resultat['Id_Lieu'] : null;
    }

    public function Verifdate() :void
    {
        $dateJour = date("Y-m-d");
        $sql = "SELECT * FROM Repas WHERE Dates = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('d', $dateJour);
        $stmt->execute();
        echo $stmt;
    }


}
?>
