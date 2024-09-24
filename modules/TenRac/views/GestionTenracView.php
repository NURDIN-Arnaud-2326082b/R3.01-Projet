<?php

namespace TenRac\views;
class GestionTenracView extends AbstractView
{

    protected function body()
    {
        include __DIR__ . '/gestionTenrac.php';
    }

    function css(): string
    {
        return 'style.css';
    }

    function pageTitle(): string
    {
        return 'Gestion Tenrac';
    }
}