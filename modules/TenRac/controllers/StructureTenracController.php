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
            echo '</ul><br><form action="/delete-structure" method="POST"><input type="hidden" name="action" value="delete">
            <button type="submit" name="delete" value="'.$id.'"></form>Supprimer le club</button></div>';
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
            $idClub = $_POST['id'];
            $nomClub = $_POST['nomClub'];
            $adresse = $_POST['adr'];

            if(($nomClub === " " OR $nomClub === 'Ordre') AND $adresse === " "){
                self::affichePage();
            } else if ($adresse === " "){
                $structureModel = new StructureTenracModel(new DbConnect());
                $structureModel->updateStructure($idClub, $nomClub, "SELECT Adresse FROM Ordre_et_club WHERE Id_club =" . $idClub);
                self::affichePage();
                exit();
            } else if ($nomClub === " " OR $nomClub === 'Ordre'){
                $structureModel = new StructureTenracModel(new DbConnect());
                $structureModel->updateStructure($idClub, "SELECT Nom_club FROM Ordre_et_club WHERE Id_club =" . $idClub,
                    $adresse);
                self::affichePage();
                exit();
            } else if(($nomClub !== " " OR $nomClub !== 'Ordre') AND  $adresse !== " "){
                $structureModel = new StructureTenracModel(new DbConnect());
                $structureModel->updateStructure($idClub, $nomClub, $adresse);
                self::affichePage();
                exit();
            }
        }
    }
}