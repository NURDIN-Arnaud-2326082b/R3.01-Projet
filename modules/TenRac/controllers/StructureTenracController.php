<?php

namespace  TenRac\controllers;
use TenRac\models\StructureTenracModel;
use TenRac\models\DbConnect;
use TenRac\views\StructureTenracView;

class StructureTenracController
{

    public function genererListe(): void{
        $structureModel = new StructureTenracModel(new DbConnect());
        $structures = $structureModel->listeClub();
        foreach ($structures as $structure) {
            $name = implode(',', $structure);
            echo '<div class="descri_club"> <h3>' . $name . "</h3><br>";
            $adresse = $structureModel->chercheAdresse($name);
            echo "<p>Adresse : " . $adresse[0]['Adresse'] . "</p>";
            echo "</p></div>";
        }
    }

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
            exit();
        }
    }

    public function deleteStructure(): void{
        if($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'delete'){
            $structureDeleted = $_POST['id'];

            $ordre = 'SELECT id FROM Ordre_et_club WHERE id = 1';

            if($structureDeleted === $ordre){
                echo 'L\'ordre ne peut pas être supprimé.';
            }else{
                $structureModel = new StructureTenracModel(new DbConnect());

                $structureModel->deleteStructure($structureDeleted);
                header('Location :/index.php');
                exit();
            }
        }
    }

    public function updateStructure(): void{
        if ($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'update') {
            $nomClub = $_POST['nom2'];
            $adresse = $_POST['adr'];

            $idPere = "SELECT Id_club FROM Ordre_et_club WHERE Nom_club = " .$_POST['nomPere'];

            $idClub = "SELECT Id_club FROM Ordre_et_club WHERE Nom_club = " .$_POST['nom'];

            $structureModel = new StructureTenracModel(new DbConnect());
            $structureModel->updateStructure($idClub, $idPere, $nomClub, $adresse);
            header('Location :/index.php');
            exit();
        }
    }
}