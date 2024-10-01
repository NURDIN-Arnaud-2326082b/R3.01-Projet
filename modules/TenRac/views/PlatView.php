<?php

namespace TenRac\views;

use TenRac\controllers\PlatController;

class PlatView extends AbstractView
{

    function css(): string
    {
        return 'Plat.css';
    }

    function pageTitle(): string
    {
        return 'Plat';
    }

    protected function body()
    {
        include __DIR__ . '/plat.php';
        $platcontroller = new PlatController();
        if(isset($_POST['recherche'])){
            $platcontroller->recherche($_POST['recherche']);
        }
        else{
            $platcontroller->generer();
        }
    }
}