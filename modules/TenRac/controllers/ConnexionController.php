<?php

namespace  TenRac\controllers;

use TenRac\models\ConnexionModel;
use TenRac\models\DbConnect;
use TenRac\views\ConnexionView;


/**
 * Contrôleur pour la gestion de la connexion utilisateur.
 *
 * Cette classe gère l'affichage de la page de connexion, la connexion d'un utilisateur
 * ainsi que la déconnexion.
 *
 * @package TenRac\controllers
 */
class ConnexionController
{

    /**
     * Affiche la page de connexion.
     *
     * Cette méthode démarre une session utilisateur et affiche la vue de connexion.
     *
     * @return void
     */
    public static function affichePage(): void
    {
        session_start();
        $view = new ConnexionView();
        $view->afficher();
    }


    /**
     * Connecte l'utilisateur à l'application.
     *
     * Cette méthode traite les informations de connexion, les nettoie, puis
     * appelle le modèle pour vérifier la validité des identifiants. Si la connexion
     * est réussie, l'utilisateur est redirigé vers la page d'accueil. Sinon, un message
     * d'erreur est affiché.
     *
     * @param array $post Les données du formulaire de connexion (courriel et mot de passe).
     * @return void
     */
    public static function connecter(array $post): void
    {
        setcookie(
            'courrielTenrac',
            $post["email"],
            [
                'expires' => time() + 365*24*3600,
                'secure' => true,
                'httponly' => true,
            ]
        );
        $courriel = htmlspecialchars($post["email"]);
        $password = htmlspecialchars($post["password"]);

        $connexionModel = new ConnexionModel(new DbConnect());

        if ($connexionModel->login($courriel, $password)) {
            setcookie(
                'courrielTenrac',
                $post["email"],
                [
                    'expires' => time() + 365*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            header("Location: /home");
            exit();
        } else {
            echo "Mail ou mot de passe incorrect";
            exit();
        }
    }


    /**
     * Déconnecte l'utilisateur de l'application.
     *
     * Cette méthode appelle le modèle pour déconnecter l'utilisateur, puis redirige
     * vers la page de connexion.
     *
     * @return void
     */
    public static function deconnecter(): void
    {
        $connexionModel = new ConnexionModel(new DbConnect());
        $connexionModel->logout();

        header("Location: /connexion");
        exit();
    }

}