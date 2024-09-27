<?php

namespace TenRac\controllers;
session_start();
use TenRac\views\HomePageView;

class HomePageController
{
    public static function affichePage():void
    {
        $view = new HomePageView();
        $view->afficher();
    }
}