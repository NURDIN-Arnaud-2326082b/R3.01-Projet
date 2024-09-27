<?php
namespace TenRac\views;

use TenRac\controllers\StructureTenracController;
use TenRac\models\DbConnect;

class StructureTenracView extends AbstractView
{
    protected function body(): void
    {
        include __DIR__ . '/structureTenrac.php';
        $structureController = new StructureTenracController();
        $structureController->genererListe();
        include __DIR__ . '/structureTenrac2.php';
    }

    function css(): string
    {
        return 'structure.css';
    }

    function pageTitle(): string
    {
        return 'Structure';
    }

}