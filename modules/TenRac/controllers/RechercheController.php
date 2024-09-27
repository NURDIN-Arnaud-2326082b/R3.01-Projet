<?php

namespace TenRac\controllers;

use TenRac\models\DbConnect;
use TenRac\models\RechercheModel;
use TenRac\views\RechercheView;

class RechercheController
{
    public static function affichePage(): void
    {
        $view = new RechercheView();
        $view->afficher();
    }

    public static function lancerRecherche():void{
        $recherche = new RechercheModel(new DbConnect());
        $recherche->lancerRecherche();
    }
}