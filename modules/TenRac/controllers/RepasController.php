<?php

namespace TenRac\controllers;

use TenRac\models\DbConnect;
use TenRac\models\RepasModel;
use TenRac\views\RepasView;

class RepasController{

    public static function affichePage(): void{
        session_start();
        $view = new RepasView();
        $view->afficher();
    }

    public static function Verifdate(): void
    {
        $model = new RepasModel(new DbConnect());
        $model->Verifdate();

    }


}?>