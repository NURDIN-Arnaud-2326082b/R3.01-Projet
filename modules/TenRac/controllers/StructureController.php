<?php

namespace  TenRac\controllers;
use TenRac\models\StructureModel;
use TenRac\models\DbConnect;
use TenRac\views\StructureView;

class StructureController
{
    public function genererListe(): void{
        $structureModel = new StructureModel(new DbConnect());
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
        $view = new StructureView();
        $view->afficher();
    }
}