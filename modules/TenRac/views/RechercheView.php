<?php
namespace TenRac\views;

class RechercheView extends AbstractView
{

    protected function body(): void
    {
        include __DIR__ . '/recherche.php';
    }

    function css(): string
    {
        return 'style.css';
    }

    function pageTitle(): string
    {
        return 'Repas Recherhé';
    }
}