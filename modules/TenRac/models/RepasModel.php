<?php
namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;

class RepasModel {
    protected $conn;

    public function __construct(private DbConnect $connect){}

    public function PresenceCouD(): bool {
        $rep = $this->conn->prepare("SELECT * FROM Repas WHERE Gerant");
        $rep->execute();
        $result = $rep->get_result();
        if ($result->num_rows > 0) {
                if ($rep["Gerant"] != NULL) {
                    return true;
                }
        }
        return false;
    }

    public function getDate($id_repas) {
        $stmt = $this->conn->prepare('SELECT Dates FROM Repas WHERE Id_repas = ?');
        $stmt->bind_param('i', $id_repas);
        $stmt->execute();
        $resultat = $stmt->get_result()->fetch_assoc();

        return $resultat ? $resultat['Dates'] : null;
    }

    public function getLieu($id_repas) {
        $stmt = $this->conn->prepare('SELECT Id_Lieu FROM Repas WHERE Id_repas = ?');
        $stmt->bind_param('i', $id_repas);
        $stmt->execute();
        $resultat = $stmt->get_result()->fetch_assoc();

        return $resultat ? $resultat['Id_Lieu'] : null;
    }

    public function Verifdate() :bool
    {
        // todo
    }


}
?>
