<?php

namespace TenRac\models;

use TenRac\models\DbConnect;


/**
 * Modèle de gestion de la connexion utilisateur.
 *
 * Cette classe gère l'authentification des utilisateurs en vérifiant leur courriel et leur mot de passe,
 * et gère également la déconnexion.
 *
 * @package TenRac\models
 */
class ConnexionModel
{

    /**
     * Constructeur de la classe ConnexionModel.
     *
     * Initialise la connexion à la base de données via une instance de `DbConnect`.
     *
     * @param DbConnect $connect Objet de connexion à la base de données.
     */
    public function __construct(private DbConnect $connect)
    {
    }


    /**
     * Connecte un utilisateur avec son courriel et mot de passe.
     *
     * Vérifie si l'utilisateur existe dans la base de données et si le mot de passe fourni correspond au mot de passe haché stocké.
     * Si la connexion réussit, les informations de session sont initialisées.
     *
     * @param string $courriel L'adresse email de l'utilisateur.
     * @param string $password Le mot de passe de l'utilisateur.
     *
     * @return bool Retourne true si la connexion est réussie, sinon false.
     */
    public function login($courriel, $password): bool
    {
        $stmt = $this->connect->mysqli()->prepare("SELECT Nom, Code_personnel FROM Tenrac WHERE courriel = ?");
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("s", $courriel);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_nom, $db_password);
            $stmt->fetch();

            if (password_verify($password, $db_password)) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['courriel'] = $courriel;
                $_SESSION['nom'] = $db_nom;

                $stmt->close();
                return true;
            }
        }

        $stmt->close();
        return false;
    }


    /**
     * Déconnecte l'utilisateur.
     *
     * Détruit toutes les variables de session et met fin à la session actuelle.
     *
     * @return void
     */
    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
    }


//    public function verifyTenrac($courriel, $password)
//    {
//        $stmt = $this->connect->mysqli()->prepare("SELECT Nom, Code_personnel FROM Tenrac WHERE courriel = ?");
//        if (!$stmt) {
//            echo "Erreur de requête: " . $this->conn->error . "\n";
//            return false;
//        }
//        $stmt->bind_param("s", $courriel);
//        $stmt->execute();
//        $stmt->store_result();
//
//        if ($stmt->num_rows > 0) {
//            $db_password = '';
//            $db_nom = '';
//            $stmt->bind_result($db_nom,$db_password);
//            $stmt->fetch();
//
//
//            if (password_verify($password, $db_password)) {
//                $_SESSION['loggedin'] = true;
//                return true;
//            }
//        }
//
//        $stmt->close();
//        return false;
//    }


}