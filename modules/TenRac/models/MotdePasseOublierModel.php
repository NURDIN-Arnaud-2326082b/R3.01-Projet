<?php

namespace TenRac\models;

use TenRac\models\DbConnect;


class MotdePasseOublierModel
{
    private $connect;

    public function __construct(DbConnect $connect)
    {
        $this->connect = $connect;
    }

    public function envoyerMail($email)
    {
        if (isset($email)) {

            $conn = $this->connect->mysqli();

            $sql = "SELECT * FROM Tenrac WHERE Courriel = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $newPassword = uniqid();
                $hashedpassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $message = "Voici votre nouveau mot de passe : " . $newPassword;

                if (mail($email, 'Oubli de mot de passe', $message)) {
                    $sql = "UPDATE Tenrac SET Code_personnel = ? WHERE Courriel = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ss', $hashedpassword, $email);
                    $stmt->execute();

                    echo "Un e-mail a été envoyé avec votre mot de passe.";
                } else {
                    echo "Échec de l'envoi de l'e-mail.";
                }
            } else {
                echo "Aucun utilisateur trouvé avec cet e-mail.";
            }
        }
    }
}




