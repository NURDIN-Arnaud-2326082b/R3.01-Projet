<?php

namespace TenRac\controllers;

use TenRac\models\ConnexionModel;
use TenRac\models\DbConnect;
use TenRac\models\MotdePasseOublierModel;
use TenRac\views\MotDePasseOublieView;

class MotDePasseOublierController
{

    public static function affichePage(): void
    {
        session_start();
        $view = new MotDePasseOublieView();
        $view->afficher();
    }

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