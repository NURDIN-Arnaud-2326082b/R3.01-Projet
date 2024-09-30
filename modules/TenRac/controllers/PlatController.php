<?php

namespace TenRac\controllers;
use TenRac\models\DbConnect;
use TenRac\models\PlatModel;
use TenRac\views\PlatView;

class PlatController
{
    public static function affichePage(): void
    {
        session_start();
        $view = new PlatView();
        $view->afficher();
    }

    public function recherche($nomRecherche): void
    {
        $platModel = new PlatModel(new DbConnect());
        $plats = $platModel->creerListeSelonRecherche($nomRecherche);
        foreach ($plats as $plat) {
            $plt = implode(", ", $plat);
            echo '<div id="listeplat"><p>' . $plt . "<br>";
            $index = $platModel->chercheIdPlat($plt);
            $idx = $index[0]['Id_Plat'];
            $ingredients = $platModel->trouverIngredient((int)$idx);
            foreach ($ingredients as $ingredient){
                echo implode(",",$ingredient)."<br>";
            }
            echo "</p></div>";
        }
    }

    public function generer() : void{
        $platmodel = new PlatModel(new DbConnect());
        $plats = $platmodel->creerListe();
        foreach ($plats as $plat) {
            $plt = implode(", ", $plat);
            echo '<div id="listeplat"><p>' . $plt . "<br>";
            $index = $platmodel->chercheIdPlat($plt);
            $idx = $index[0]['Id_Plat'];
            $ingredients = $platmodel->trouverIngredient((int)$idx);
            foreach ($ingredients as $ingredient){
                echo implode(",",$ingredient)."<br>";
            }
            echo "</p></div>";
        }
    }
    public function addPlat(): void{
        if ($_SERVER["REQUEST_METHOD"] === "POST" AND $_POST['action'] === 'add') {
            $nomPlat = $_POST['nom'];
            $nomIngredient = $_POST['ingr'];
            $platModel = new PlatModel(new DbConnect());
            $platModel->addPlat($nomPlat,$nomIngredient);
        }
    }

    public function recupIngredient(): void
    {
        $platmodel = new PlatModel((new DbConnect()));
        $ingredientS = $platmodel->listerIngredient();
        foreach ($ingredientS as $ingr){
            $tmp = implode(",",$ingr);
            echo  '<option value="ingredient1">'.$tmp.'</option>';
        }
    }
}