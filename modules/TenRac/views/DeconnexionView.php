<?php

namespace TenRac\views;

class DeconnexionView extends AbstractView
{

    protected function body(): void
    {
        include __DIR__ . '/deconnexion.php';
    }

    function css(): string
    {
        return 'connexion.css';
    }

    function pageTitle(): string
    {
        return 'Deconnexion';
    }
}