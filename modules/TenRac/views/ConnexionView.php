<?php

namespace TenRac\views;

class ConnexionView extends AbstractView
{

    protected function body(): void
    {
        include __DIR__ . '/connexion.php';
    }

    function css(): string
    {
        return '../assets/css/connexion.css';
    }

    function pageTitle(): string
    {
        return 'Connexion';
    }
}