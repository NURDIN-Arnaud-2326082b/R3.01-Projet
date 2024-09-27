<?php
namespace TenRac\views;
use TenRac\controllers\RepasController;
use TenRac\models\RepasModel;
class RepasView extends AbstractView
{

private bool $dateExists;

    public function __construct(
        bool $dateExists
    )
    {

        $this->dateExists=$dateExists;
    }

    protected function body(): void
    {
        global $dateExistsbool;
        $dateExistsbool=$this->dateExists;

        include __DIR__ . '/repas.php';
    }

    function css(): string
    {
        return 'Repas.css';
    }

    function pageTitle(): string
    {
        return 'Nos Repas';
    }
}