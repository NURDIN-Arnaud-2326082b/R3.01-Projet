<?php

namespace TenRac\controllers;

use TenRac\views\PlatView;

class PlatController
{
    public static function affichePage()
    {
        $view = new PlatView();
        $view->afficher();
    }
}