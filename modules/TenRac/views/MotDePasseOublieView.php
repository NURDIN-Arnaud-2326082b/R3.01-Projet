<?php
namespace TenRac\views;


class MotDePasseOublieView extends AbstractView
{


    protected function body(): void
    {
        include __DIR__ . '/motDePasseOublier.php';
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