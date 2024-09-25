<?php

namespace TenRac\views;

use Override;
use TenRac\views\Header\HeaderView;

class HomePageView extends AbstractView
{
    protected function body(): void
    {
        include __DIR__ . '/homepage.php';
    }

    function css(): string
    {
        return 'style.css';
    }

    function pageTitle(): string
    {
        return 'Accueil';
    }

    #[Override] public function afficher(): void
    {
        parent::afficher();
    }
}