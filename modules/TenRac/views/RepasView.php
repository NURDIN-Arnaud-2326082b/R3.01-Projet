<?php
namespace TenRac\views;
use TenRac\controllers\RepasController;
use TenRac\models\RepasModel;
class RepasView extends AbstractView
{

private bool $dateExists;
private string $idLieu;
private string $idPlat;


    public function __construct(bool $dateExists,string $idLieu,string $idPlat)
    {
        $this->dateExists=$dateExists;
        $this->idLieu=$idLieu;
        $this->idPlat=$idPlat;

    }

    protected function body(): void
    {
        global $dateExistsbool,$LieuBool,$PlatBool;
        $dateExistsbool=$this->dateExists;
        $LieuBool=$this->idLieu;
        $PlatBool=$this->idPlat;
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