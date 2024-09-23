<?php
require_once '../models/db_connect.php';
require_once '../models/StructureModel.php';


class StructureController
{
    private $structureModel;

    public function __construct($structureModel)
    {
        $this->structureModel = $structureModel;
    }

    public function addStructure($newStructure): void{
        if ($this->structureModel) {
            $this->structureModel->addStructure(
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
        if ($this->structureModel) {
            $this->structureModel->deleteStructure($structureDeleted);
            header('Location: ../views/structureTenrac.php');
            exit();
        } else {
            echo "Club non trouvé.";
        }
    }
}