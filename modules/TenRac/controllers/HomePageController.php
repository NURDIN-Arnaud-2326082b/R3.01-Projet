<?php

namespace TenRac\controllers;
use TenRac\views\HomePageView;

class HomePageController
{
    public static function affichePage():void
    {
        session_start();
        $view = new HomePageView();
        $view->afficher();
    }
}