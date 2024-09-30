<?php

namespace TenRac\controllers;

use TenRac\models\DbConnect;
use TenRac\models\RepasModel;
use TenRac\views\RepasView;

class RepasController{

    public static function afficheListeRepas(): void
    {

    }

    public static function afficheUnRepas(): void
    {

    }


    public function ajouterRepas(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newRepas = [
                'Dates' => $_POST['Dates'],
                'Gerant' => $_POST['Gerant'],
                'Id_lieu' => $_POST['Id_lieu']
            ];

            $tenracModel = new RepasModel(new DbConnect());
            $tenracModel->ajouterTenrac(
                $newRepas['Dates'],
                $newRepas['Gerant'],
                $newRepas['Id_lieu']
            );
            header('Location: /index.php');
            exit();
        }

    }


    public static function affichePage(): void{
        session_start();
        $dbConnect= new DbConnect();
        $repasModel = RepasModel::unSeulRepas($dbConnect, 1,2);

        $view = new RepasView(
            $repasModel->Verifdate($dbConnect),
            $repasModel->getLieu($dbConnect),
            $repasModel->getPlat($dbConnect)
        );
        $view->afficher();
    }

    public static function Verifdate(){
        $dbConnection = new DbConnect();
        return $dateExists = RepasModel::Verifdate($dbConnection);
    }

}?>