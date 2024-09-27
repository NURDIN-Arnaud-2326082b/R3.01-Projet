<?php

namespace TenRac\views;

use TenRac\controllers\PlatController;

class PlatView extends AbstractView
{
    protected function body(): void
    {
        include __DIR__ . '/plat.php';
        $platcontroller = new PlatController();
        $platcontroller->generer();
        include __DIR__ . '/platpart2.php';
        $platcontroller->recupIngredient();
        include __DIR__ . '/platpart3.php';

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