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
            $id = implode(',', $structure);
            echo '<div class="descri_club"> <h3>' . $id . ' ・ ';
            $name = $structureModel->chercheNom($id);
            echo $name[0]['Nom_club'] . '</h3><br><h4>Adresse : </h4>';
            $adresse = $structureModel->chercheAdresse($id);
            echo "<p>" . $adresse[0]['Adresse'] . "</p><br><h4>Adhérents : </h4>";
            $listeTenracs = $structureModel->chercheTenrac($id);
            echo "<ul>";
            foreach ($listeTenracs as $tenrac){
                echo "<li>" . implode($tenrac) . "</li>";
            }
            echo "</ul></div>";
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
            self::affichePage();
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
                self::affichePage();
                exit();
            }
        }
    }

    public function updateStructure(): void{
        if ($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'update') {
            $idClub = $_POST['id'];
            $newNomClub = $_POST['nom2'];
            $adresse = $_POST['adr'];

            $structureModel = new StructureTenracModel(new DbConnect());
            $structureModel->updateStructure($idClub, $newNomClub, $adresse);
            self::affichePage();
            exit();
        }
    }
}