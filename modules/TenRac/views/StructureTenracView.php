<?php

namespace TenRac\views;


class StructureTenracView extends AbstractView
{
    protected function body(): void
    {
        include __DIR__ . '/structureTenrac.php';
    }

    function css(): string
    {
        return 'structure.css';
    }

    function pageTitle(): string
    {
        return 'Structure';
    }


}