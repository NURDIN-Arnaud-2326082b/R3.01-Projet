<?php
namespace TenRac\views;
session_start();

class GestionTenracView extends AbstractView
{

    protected function body(): void
    {
        include __DIR__ . '/gestionTenrac.php';
    }

    function css(): string
    {
        return 'connexion.css';
    }

    function pageTitle(): string
    {
        return 'Gestion Tenrac';
    }
}