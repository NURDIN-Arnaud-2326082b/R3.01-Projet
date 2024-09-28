<?php

namespace TenRac\views;


use TenRac\controllers\StructureController;

class StructureView extends AbstractView
{
    protected function body(): void
    {
        include __DIR__ . '/structureTenrac.php';
        $structureController = new StructureController();
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