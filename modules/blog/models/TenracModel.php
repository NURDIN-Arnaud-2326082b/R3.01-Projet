<?php
require 'db_connect.php';
class TenracModel
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function verifyTenrac($courriel, $password)
    {
        // Préparer la requête SQL pour récupérer le mot de passe haché avec l'email fourni
        $stmt = $this->conn->prepare("SELECT Nom, Code_personnel FROM Tenrac WHERE courriel = ?");
        if (!$stmt) {
            echo "Erreur de requête: " . $this->conn->error . "\n";
            return false;
        }
        $stmt->bind_param("s", $courriel);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Récupérer le mot de passe de la base de données
            $db_password = '';
            $db_nom = '';
            $stmt->bind_result($db_nom,$db_password);
            $stmt->fetch();

          //  echo "Mot de passe récupéré depuis la base de données : " . $db_password . "<br>";
          // echo "Mot de passe saisi : " . $password . "<br>";

            // Vérifier si le mot de passe fourni correspond au mot de passe
            if ($password === $db_password) {
                $_SESSION['loggedin'] = true;
               // $_SESSION['email'] = $db_email;
                return true;
            }
        }

        $stmt->close();
        return false;
    }

    public function ajouterTenrac($Courriel, $Code_personnel, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club) {
        $sql = "INSERT INTO Tenrac (Courriel, Code_personnel, Nom, Num_tel, Adresse, Grade, Rang, Titre, Dignite, Id_club) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $Courriel, $Code_personnel, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club); // Ajout de bind_param
        if ($stmt->execute()) {
            echo "Ajout réussi";
        } else {
            echo "Erreur lors de l'ajout: " . $stmt->error;
        }
    }


    public function supprimerTenrac($Courriel) {
        $sql = "DELETE FROM tenracs WHERE  $Courriel = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$Courriel]);
    }



}
?>
