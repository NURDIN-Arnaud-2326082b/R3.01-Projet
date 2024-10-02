<?php

namespace TenRac\models;

use TenRac\models\DbConnect;


/**
 * Classe pour gérer la récupération de mot de passe oublié.
 *
 * Cette classe fournit une méthode pour envoyer un e-mail avec un nouveau mot de passe
 * en cas d'oubli de mot de passe par un utilisateur.
 *
 * @package TenRac\models
 */
class MotdePasseOublierModel
{
    private $connect;

    /**
     * Constructeur de la classe MotdePasseOublierModel.
     *
     * Initialise une instance de la classe avec une connexion à la base de données.
     *
     * @param DbConnect $connect Instance de la classe DbConnect pour la connexion à la base de données.
     */
    public function __construct(DbConnect $connect)
    {
        $this->connect = $connect;
    }


    /**
     * Envoie un e-mail avec un nouveau mot de passe à l'utilisateur.
     *
     * @param string $email L'adresse e-mail de l'utilisateur.
     *
     * @return void
     */
    public function envoyerMail($email)
    {
        if (isset($email)) {

            $conn = $this->connect->mysqli();

            // Vérifier si l'e-mail est valide
            $sql = "SELECT * FROM Tenrac WHERE Courriel = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            // Vérifier si l'utilisateur existe avec l'e-mail donné
            if ($result->num_rows > 0) {
                $newPassword = uniqid();
                $hashedpassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $message = "Voici votre nouveau mot de passe : " . $newPassword;

                // Envoyer un e-mail avec le nouveau mot de passe
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




