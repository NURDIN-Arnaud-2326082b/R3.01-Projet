<?php

namespace  TenRac\controllers;

use TenRac\models\StructureTenracModel;
use TenRac\models\DbConnect;
use TenRac\views\StructureView;

class StructureTenracController
{

    public static function affichePage()
    {
        $view = new StructureView();
        $view->afficher();
    }

    public function addStructure($newStructure): void{
        if ($this) {
            $this->addStructure(
                $newStructure['Id_pere'],
                $newStructure['Nom_club'],
                $newStructure['Adresse']
            );
            header('Location: ../views/structureTenrac.php');
            exit();
        } else {
            echo "Le modèle n'est pas initialisé.";
        }
    }

    public function deleteStructure($structureDeleted): void{
        if ($this) {
            $this->deleteStructure($structureDeleted);
            header('Location: ../views/structureTenrac.php');
            exit();
        } else {
            echo "Club non trouvé.";
        }
    }

    public function updateStructure($structureUpdated): void{
        if ($this) {
            $this->updateStructure(
                $structureUpdated['Id_club'],
                $structureUpdated['Id_pere'],
                $structureUpdated['Nom_club'],
                $structureUpdated['Adresse']);
            header('Location: ../views/structureTenrac.php');
            exit();
        } else {
            echo "Modification impossible.";
        }
    }
}