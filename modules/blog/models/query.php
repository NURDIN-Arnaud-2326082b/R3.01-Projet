<?php

class UserModel
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function verifyUser($email, $password)
    {
        // Préparer la requête SQL pour récupérer l'utilisateur avec l'email fourni
        $stmt = $this->conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Récupérer le mot de passe haché de la base de données
            $hashed_password = '';
            $stmt->bind_result($hashed_password);
            $stmt->fetch();
            $stmt->close();

            // Vérifier si le mot de passe fourni correspond au mot de passe haché
            if (password_verify($password, $hashed_password)) {
                return true; // Connexion réussie
            }
        }

        $stmt->close();
        return false; // Connexion échouée
    }
}
?>
