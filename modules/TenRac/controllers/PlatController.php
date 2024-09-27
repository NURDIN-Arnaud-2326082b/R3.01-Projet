<?php

namespace TenRac\controllers;
session_start();
use TenRac\models\DbConnect;
use TenRac\models\PlatModel;
use TenRac\views\PlatView;

class PlatController
{
    public static function affichePage(): void
    {
        $view = new PlatView();
        $view->afficher();
    }

    public static function generer():void{

    }
}