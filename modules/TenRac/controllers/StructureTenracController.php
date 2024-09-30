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
            echo '<form action="/update-structure" method="POST">
            <input type="hidden" name="action" value="update">
            <div class="descri_club"> <h3>' . $id . ' ・ ';

            $name = $structureModel->chercheNom($id);
            $adresse = $structureModel->chercheAdresse($id);
            echo /*$name[0]['Nom_club'] . '</h3><br>*/' 
            <input type="text" name="nomClub" value="' . $name[0]['Nom_club']. '">
            </form><br>
            <h4>Adresse : </h4>
            <input type="text" name="adr" value="' . $adresse[0]['Adresse'] . '">
            <br><h4>Adhérents : </h4>';

            /*echo "<p>" . $adresse[0]['Adresse'] . "</p></form><br><h4>Adhérents : </h4>";*/

            $listeTenracs = $structureModel->chercheTenrac($id);
            echo "<ul>";
            foreach ($listeTenracs as $tenrac){
                echo "<li>" . implode($tenrac) . "</li>";
            }

            echo '</ul><button type="submit" name="update" value="'.$id.'">Modifier le club</button></form><br>
            <form action="/delete-structure" method="POST"><input type="hidden" name="action" value="delete">
            <button type="submit" name="delete" value="'.$id.'">Supprimer le club</button></form></div>';
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
            $adresse = $_POST['adr'];

            if(($nomClub !== null AND $nomClub !== 'Ordre') AND $adresse !== null){
                $structureModel = new StructureTenracModel(new DbConnect());
                $structureModel->addStructure($nomClub, $adresse);
                self::affichePage();
                exit();
            }
        }
    }

    public function deleteStructure(): void{
        if($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'delete'){
            $structureDeleted = $_POST['delete'];

            if($structureDeleted === 1){
                echo 'L\'ordre ne peut pas être supprimé.';
            }else{
                $structureModel = new StructureTenracModel(new DbConnect());
                $structureModel->changerClubTenrac($structureDeleted);
                $structureModel->deleteStructure($structureDeleted);
                self::affichePage();
                exit();
            }
        }
    }

    public function updateStructure(): void{
        if ($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'update') {
            $idClub = $_POST['update'];
            $nomClub = $_POST['nomClub'];
            $adresse = $_POST['adr'];

            if($idClub === 1){
                $structureModel = new StructureTenracModel(new DbConnect());
                $structureModel->updateStructure($idClub, "L'Ordre", $adresse);
                self::affichePage();
                exit();
            } else{
                $structureModel = new StructureTenracModel(new DbConnect());
                $structureModel->updateStructure($idClub, $nomClub, $adresse);
                self::affichePage();
                exit();
            }
        }
    }
}