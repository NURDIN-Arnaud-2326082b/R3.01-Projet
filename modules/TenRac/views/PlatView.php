<?php

namespace TenRac\views;

class PlatView extends AbstractView
{
    protected function body(): void
    {
        include __DIR__ . '/plat.php';
    }

    function css(): string
    {
        return 'Plat.css';
    }

    function pageTitle(): string
    {
        return 'Plat';
    }
}