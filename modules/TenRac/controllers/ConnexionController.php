<?php

namespace  TenRac\controllers;

use TenRac\models\ConnexionModel;
use TenRac\models\DbConnect;
use TenRac\views\ConnexionView;

class ConnexionController
{
    public static function affichePage(): void
    {
        session_start();
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
            echo "Mail ou mot de passe incorrect";
            exit();
        }
    }


    public static function deconnecter(): void
    {
        $connexionModel = new ConnexionModel(new DbConnect());
        $connexionModel->logout();
    }

}