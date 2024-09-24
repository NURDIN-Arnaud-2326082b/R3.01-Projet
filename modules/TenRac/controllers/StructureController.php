<?php

namespace  TenRac\controllers;

use TenRac\models\StructureTenracModel;
use TenRac\models\DbConnect;
use TenRac\views\StructureView;

class StructureController
{
    public static function affichePage(): void
    {
        $view = new StructureView();
        $view->afficher();
    }
}