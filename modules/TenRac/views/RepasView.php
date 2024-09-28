<?php
namespace TenRac\views;
use TenRac\controllers\RepasController;
use TenRac\models\RepasModel;
class RepasView extends AbstractView
{

private bool $dateExists;
private string $idLieu;
    public function __construct(
        bool $dateExists,string $idLieu
    )
    {
        $this->dateExists=$dateExists;
        $this->idLieu=$idLieu;
    }

    protected function body(): void
    {
        global $dateExistsbool,$LieuBool;
        $dateExistsbool=$this->dateExists;
        $LieuBool=$this->idLieu;
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