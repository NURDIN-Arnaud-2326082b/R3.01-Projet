<?php
namespace TenRac\views;
session_start();

class RepasView extends AbstractView
{

    protected function body(): void
    {
        include __DIR__ . '/repas.php';
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