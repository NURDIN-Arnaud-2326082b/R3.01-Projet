<?php

namespace TenRac\controllers;

use TenRac\views\HomePageView;

class HomePageController
{
    public static function affichePage():void
    {
        $view = new HomePageView();
        $view->afficher();
    }
}