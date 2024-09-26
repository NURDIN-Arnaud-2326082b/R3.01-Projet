<?php
namespace TenRac\views;
use TenRac\controllers\RepasController;
use TenRac\models\RepasModel;

session_start();

class RepasView extends AbstractView
{

    protected function body(): void
    {
        include __DIR__ . '/repas.php';
        $controller = new RepasController();
        $controller::Verifdate();
    }

    function css(): string
    {
        return 'Repas.css';
    }

    function pageTitle(): string
    {
        return 'Nos Repas';
    }
}