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
        // Vérifie si le modèle est bien initialisé
        if ($this->structureModel) {
            $this->structureModel->addStructure(
                $newStructure['Id_pere'],
                $newStructure['Nom_club'],
                $newStructure['Adresse']
            );
            header('Location: /index.php');
            exit();
        } else {
            echo "Le modèle n'est pas initialisé.";
        }
    }

}