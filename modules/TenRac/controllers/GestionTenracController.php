<?php

namespace TenRac\controllers;
use TenRac\models\DbConnect;
use TenRac\models\GestionTenracModel;
use TenRac\views\GestionTenracView;

class GestionTenracController
{

    public static function affichePage(): void{
        session_start();
        $view = new GestionTenracView();
        $view->afficher();
    }


    public function ajouterTenrac(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newTenrac = [
                'Courriel' => $_POST['Courriel'],
                'Code_personnel' => $_POST['Code_personnel'],
                'Nom' => $_POST['Nom'],
                'Num_tel' => $_POST['Num_tel'],
                'Adresse' => $_POST['Adresse'],
                'Grade' => $_POST['Grade'],
                'Rang' => $_POST['Rang'],
                'Titre' => $_POST['Titre'],
                'Dignite' => $_POST['Dignite'],
                'Id_club' => $_POST['Id_club']
            ];

            $tenracModel = new GestionTenracModel(new DbConnect());
            $tenracModel->ajouterTenrac(
                $newTenrac['Courriel'],
                $newTenrac['Code_personnel'],
                $newTenrac['Nom'],
                $newTenrac['Num_tel'],
                $newTenrac['Adresse'],
                $newTenrac['Grade'],
                $newTenrac['Rang'],
                $newTenrac['Titre'],
                $newTenrac['Dignite'],
                $newTenrac['Id_club']
            );
            mail($newTenrac['Courriel'], 'Nouveau membre', 'Bienvenue dans la communaute des tenracs ! Votre identifiant et cette adresse mail et le mot de passe est : ' . $newTenrac['Code_personnel']);
            header('Location: /index.php');
            exit();
        }

    }

    public function supprimerTenrac(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenracSuppr =  $_POST['Courriel'];

            $tenracModel = new GestionTenracModel(new DbConnect());
            if ($tenracModel){
                $tenracModel->supprimerTenrac($tenracSuppr);
                header('Location: /index.php');
                exit();
            } else {
                echo "Tenrac non trouvé.";
        }
        }
    }

    public function modifierTenrac(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenracModif = [
                'Courriel' => $_POST['Courriel'],
                'Code_personnel' => $_POST['Code_personnel'],
                'Nom' => $_POST['Nom'],
                'Num_tel' => $_POST['Num_tel'],
                'Adresse' => $_POST['Adresse'],
                'Grade' => $_POST['Grade'],
                'Rang' => $_POST['Rang'],
                'Titre' => $_POST['Titre'],
                'Dignite' => $_POST['Dignite'],
                'Id_club' => $_POST['Id_club']
            ];

            $tenracModel = new GestionTenracModel(new DbConnect());
            $tenracModel->modifierTenrac(
                $tenracModif['Courriel'],
                $tenracModif['Code_personnel'],
                $tenracModif['Nom'],
                $tenracModif['Num_tel'],
                $tenracModif['Adresse'],
                $tenracModif['Grade'],
                $tenracModif['Rang'],
                $tenracModif['Titre'],
                $tenracModif['Dignite'],
                $tenracModif['Id_club']
            );
            header('Location: /index.php');
            exit();
        }
    }

}