<?php
require 'db_connect.php';

class RepasModel {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function PresenceCouD(): bool {
        $rep = $this->conn->prepare("SELECT * FROM Repas WHERE Gerant");
        $rep->execute();
        $result = $rep->get_result(); // Obtenir le résultat
        if ($result->num_rows > 0) {
                if ($rep["Gerant"] != NULL) {
                    return true;
                }
        }
        return false;
    }

    public function getDate($id_repas) {
        $stmt = $this->conn->prepare('SELECT Dates FROM Repas WHERE Id_repas = ?');
        $stmt->bind_param('i', $id_repas); // Assurez-vous de lier le paramètre
        $stmt->execute();
        $resultat = $stmt->get_result()->fetch_assoc(); // Récupérez le résultat comme un tableau associatif

        return $resultat ? $resultat['Dates'] : null; // Vérifiez si $resultat est non null avant d'accéder à l'indice
    }

    public function getLieu($id_repas) {
        $stmt = $this->conn->prepare('SELECT Id_Lieu FROM Repas WHERE Id_repas = ?');
        $stmt->bind_param('i', $id_repas); // Assurez-vous de lier le paramètre
        $stmt->execute();
        $resultat = $stmt->get_result()->fetch_assoc(); // Récupérez le résultat comme un tableau associatif

        return $resultat ? $resultat['Id_Lieu'] : null; // Vérifiez si $resultat est non null avant d'accéder à l'indice
    }


}
?>
