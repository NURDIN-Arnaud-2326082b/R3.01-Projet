<?php

namespace TenRac\views;


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
}