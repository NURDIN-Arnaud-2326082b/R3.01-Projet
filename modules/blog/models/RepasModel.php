<?php
require 'db_connect.php';


class RepasModel{
    protected $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function PresenceCouD(): bool
    {
        $rep = $this->conn->prepare("SELECT * FROM Repas WHERE Gerant IS NOT NULL;");
        $rep->execute();
        if ($rep->rowCount() > 0) {
            while ($row = $rep->fetch(PDO::FETCH_ASSOC)) {
                if ($row["Gerant"] != NULL) {
                    return true;
                }
            }
        }
        return false;
    }
    public function getDate() {
        $stmt = $this->conn->prepare('SELECT Dates FROM Repas WHERE id = ?');
        $stmt->execute();
        $resultat = $stmt->fetch();
        return $resultat['Dates'];
    }
    public function getLieu() {
        $stmt = $this->conn->prepare('SELECT Id_Lieu FROM Repas WHERE id = ?');
        $stmt->execute();
        $resultat = $stmt->fetch();
        return $resultat['Id_Lieu'];
    }
}?>