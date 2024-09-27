<?php

namespace TenRac\controllers;

use TenRac\models\DbConnect;
use TenRac\models\RepasModel;
use TenRac\views\RepasView;

class RepasController{

    public static function affichePage(): void{
        session_start();
        $view = new RepasView(
            self::Verifdate(),

        );
        $view->afficher();
    }

    public static function Verifdate(){
        $dbConnection = new DbConnect();
        $dateExists = new RepasModel( new $dbConnection());
        return $dateExists->Verifdate();

    }


}?>