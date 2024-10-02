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
        $loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
        if($loggedin == true){
            include __DIR__ . '/plat.php';
            $platcontroller = new PlatController();
            if(isset($_POST['recherche'])){
                $platcontroller->recherche($_POST['recherche']);
            }
            else{
                $platcontroller->generer();
            }
            include __DIR__ . '/platpart2.php';
            $platcontroller->recupIngredient(1);
            $platcontroller->recupIngredient(2);
            $platcontroller->recupIngredient(3);
            $platcontroller->recupIngredient(4);
            $platcontroller->recupIngredient(5);
            include __DIR__. '/platpart3.php';
        }
        else {
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
}