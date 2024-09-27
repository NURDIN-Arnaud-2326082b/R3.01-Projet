<?php

namespace TenRac\controllers;
session_start();
use TenRac\models\DbConnect;
use TenRac\models\RepasModel;
use TenRac\views\RepasView;

class RepasController{

    public static function affichePage(): void{
        $view = new RepasView();
        $view->afficher();
    }

    public static function Verifdate(){
        $model = new RepasModel(new DbConnect());
        $model->Verifdate();

    }


}?>