<?php

namespace TenRac\views;

use TenRac\models\DbConnect;
use TenRac\models\PlatModel;

class PlatView extends AbstractView
{
    protected function body(): void
    {
        include __DIR__ . '/plat.php';

        $platmodel = new PlatModel(new DbConnect());
        $plats = $platmodel->creerListe();
        foreach ($plats as $plat) {
            $plt = implode(", ", $plat);
            echo '<div id="listeplat"><p>' . $plt . "<br>";
            $index = $platmodel->cherhceIdPlat($plt);
            $idx = $index[0]['Id_Plat'];
            $ingredients = $platmodel->trouverIngredient((int)$idx);
            $taille = count($ingredients);
            foreach ($ingredients as $ingredient){
                echo implode(",",$ingredient)."<br>";
            }
            echo "</p></div>";
        }

        include __DIR__ . '/platpart2.php';
    }

    function css(): string
    {
        return 'Plat.css';
    }

    function pageTitle(): string
    {
        return 'Plat';
    }
}