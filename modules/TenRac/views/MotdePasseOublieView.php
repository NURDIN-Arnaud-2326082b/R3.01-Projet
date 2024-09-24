<?php

namespace TenRac\views;

class MotdePasseOublieView
{
    protected function body(): void
    {
        include __DIR__ . '/MotDePasseOublier.php';
    }

    function css(): string
    {
        return 'connexion.css';
    }

    function pageTitle(): string
    {
        return 'Mot de Passe Oublié';
    }
}