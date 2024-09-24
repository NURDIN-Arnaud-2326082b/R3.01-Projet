<?php

namespace TenRac\controllers;

use TenRac\models\DbConnect;
use TenRac\models\PlatModel;
use TenRac\views\PlatView;

class PlatController
{
    public static function affichePage()
    {
        $view = new PlatView();
        $view->afficher();
    }

    public static function generer():void{

    }
}