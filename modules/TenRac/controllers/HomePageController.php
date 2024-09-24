<?php

namespace TenRac\controllers;

use TenRac\views\HomePageView;

class HomePageController
{
    public static function affichePage()
    {
        $view = new HomePageView();
        $view->afficher();
    }
}