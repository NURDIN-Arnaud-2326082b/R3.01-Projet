<?php

namespace TenRac\controllers;

use TenRac\models\ConnexionModel;
use TenRac\models\DbConnect;
use TenRac\models\MotdePasseOublierModel;
use TenRac\views\MotDePasseOublieView;


/**
 * Contrôleur pour la fonctionnalité de mot de passe oublié.
 *
 * Cette classe gère l'affichage de la page de mot de passe oublié et l'envoi d'un courriel
 * avec les instructions pour réinitialiser le mot de passe.
 *
 * @package TenRac\controllers
 */
class MotDePasseOublierController
{


    /**
     * Affiche la page de mot de passe oublié.
     *
     * Cette méthode démarre une session utilisateur (si elle n'est pas déjà démarrée)
     * et affiche la vue associée à la page de mot de passe oublié.
     *
     * @return void
     */
    public static function affichePage(): void
    {
        session_start();
        $view = new MotDePasseOublieView();
        $view->afficher();
    }


    /**
     * Envoie un courriel pour réinitialiser le mot de passe.
     *
     * Cette méthode vérifie l'existence de l'adresse e-mail dans la base de données et,
     * si elle est trouvée, envoie un courriel avec des instructions pour réinitialiser le mot de passe.
     *
     * @param array $post Les données envoyées depuis le formulaire, contenant l'adresse e-mail.
     *
     * @return void
     */
    public static function envoyerCourriel(array $post)
    {
        $courriel = htmlspecialchars($post["email"]);

        $connexionModel = new MotdePasseOublierModel(new DbConnect());

        if ($connexionModel->envoyerMail($courriel)) {
            header("Location: /connexion");
            exit();
        }
    }
}