<?php

namespace TenRac\controllers;

use TenRac\models\DbConnect;
use TenRac\models\RepasModel;
use TenRac\views\RepasView;

class RepasController{

    public static function affichePage(): void{
        $view = new RepasView();
        $view->afficher();
    }


}?>