<?php

namespace  TenRac\controllers;

use TenRac\models\ConnexionModel;
use TenRac\models\DbConnect;
use TenRac\views\ConnexionView;

class ConnexionController
{
    public static function affichePage(): void
    {
        $view = new ConnexionView();
        $view->afficher();
    }

    public static function connecter(array $post): void
    {
        $courriel = htmlspecialchars($post["email"]);
        $password = htmlspecialchars($post["password"]);

        $connexionModel = new ConnexionModel(new DbConnect());

        if ($connexionModel->login($courriel, $password)) {
            header("Location: /home");
            exit();
        } else {
            header("Location: /connexion?error=invalid");
            exit();
        }
    }


    public static function deconnecter(): void
    {
        $connexionModel = new ConnexionModel(new DbConnect());
        $connexionModel->logout();

        header("Location: /connexion");
        exit();
    }
}