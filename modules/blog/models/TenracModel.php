<?php

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
        $stmt = $this->conn->prepare("SELECT Code_personnel FROM Tenrac WHERE courriel = ?");
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
            $stmt->bind_result($db_password);
            $stmt->fetch();

          //  echo "Mot de passe récupéré depuis la base de données : " . $db_password . "<br>";
          // echo "Mot de passe saisi : " . $password . "<br>";

            // Vérifier si le mot de passe fourni correspond au mot de passe haché
            if ($password === $db_password) {
                return true; // Connexion réussie
            }
        }

        $stmt->close();
        return false; // Connexion échouée
    }

    public function ajouterTenrac($email, $code, $nom, $telephone, $adresse, $grade, $rang, $titre, $dignite, $idClub){
        $sql = "INSERT INTO Tenrac (Courriel, Code_personnel, Nom, Num_tel, Adresse, Grade, Rang, Titre, Dignite, Id_club) VALUES (?, ?, ?, ?, ?, ?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email,$code, $nom, $telephone, $adresse, $grade, $rang, $titre, $dignite, $idClub]);
    }

    public function supprimerTenrac($Courriel) {
        $sql = "DELETE FROM tenracs WHERE  $Courriel = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$Courriel]);
    }



}
?>
