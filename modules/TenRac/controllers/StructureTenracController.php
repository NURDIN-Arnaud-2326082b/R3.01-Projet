<?php

namespace  TenRac\controllers;
use TenRac\models\StructureTenracModel;
use TenRac\models\DbConnect;
use TenRac\views\StructureTenracView;

class StructureTenracController
{

    public static function affichePage(): void
    {
        session_start();
        $view = new StructureTenracView();
        $view->afficher();
    }

    public function addStructure(): void{
        if ($_SERVER["REQUEST_METHOD"] === "POST" AND $_POST['action'] === 'add') {
            $nomClub = $_POST['nom'];
            $nomPere = $_POST['pere'];
            $adresse = $_POST['adr'];

            $idPere = "SELECT Id_club FROM Ordre_et_club WHERE Nom_club = '$nomPere'";

            $structureModel = new StructureTenracModel(new DbConnect());
            $structureModel->addStructure($idPere, $nomClub, $adresse);

            header('Location :/index.php');
            exit();
        }
    }

    public function deleteStructure(): void{
        if($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'delete'){
            $structureDeleted = $_POST['id'];

            $structureModel = new StructureTenracModel(new DbConnect());

            $structureModel->deleteStructure($structureDeleted);
            header('Location :/index.php');
            exit();
        }
    }

    public function updateStructure(): void{
        if ($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'update') {
            $nomPere = $_POST['nomPere'];
            $nomClub = $_POST['nom2'];
            $adresse = $_POST['adr2'];

            $idPere = "SELECT Id_club FROM Ordre_et_club WHERE Nom_club = '$nomPere'";

            $idClub = "SELECT Id_club FROM Ordre_et_club WHERE Id_pere = '$idPere' AND Nom_club = '$nomClub'
                        AND Adresse = '$adresse'";

            $structureModel = new StructureTenracModel(new DbConnect());
            if($structureModel){
                $structureModel->updateStructure($idClub, $idPere, $nomClub, $adresse);
                header('Location :/index.php');
                exit();
            } else {
                echo "Modification impossible.";
            }
        }
    }
}