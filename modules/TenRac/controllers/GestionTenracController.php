<?php

namespace TenRac\controllers;

use TenRac\models\DbConnect;
use TenRac\models\GestionTenracModel;
use TenRac\views\GestionTenracView;

class GestionTenracController
{

    public static function afficherPage(){
        $view = new GestionTenracView();
        $view->afficher();
    }


    public function ajouterTenrac(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newTenrac = [
                'Id' => $_POST['Id'],
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

            $tenracModel = new GestionTenracModel();
            $this->tenracModel->ajouterTenrac(
                $newTenrac['id'],
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
            header('Location: /index.php');
            exit();
        }

    }

    public function supprimerTenrac(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenracSuppr =  $_POST['Courriel'];

            $tenracModel = new GestionTenracModel();
            if ($this->tenracModel){
                $this->tenracModel->supprimerTenrac($tenracSuppr);
                header('Location: /index.php');
                exit();
            } else {
                echo "Tenrac non trouvé.";
        }
        }
    }

    public function modifierTenrac($newTenrac): void
    {
        if ($this->tenracModel){
            $this->tenracModel->modifierTenrac(
                $newTenrac['id'],
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
            header('Location: /index.php');
            exit();
        } else {
            echo "Tenrac non trouvé.";
        }
    }

}