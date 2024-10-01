<?php

namespace TenRac\controllers;
use TenRac\models\DbConnect;
use TenRac\models\PlatModel;
use TenRac\models\StructureTenracModel;
use TenRac\views\PlatTenracView;
use TenRac\views\PlatView;


/**
 * Contrôleur pour gérer les plats dans l'application.
 *
 * Ce contrôleur gère l'affichage des plats, la recherche,
 * l'ajout de plats et la récupération des ingrédients.
 *
 * @package TenRac\controllers
 */
class PlatController
{

    /**
     * Affiche la page des plats.
     *
     * Cette méthode démarre la session utilisateur et affiche la vue associée à la gestion des plats.
     *
     * @return void
     */
    public static function affichePage(): void
    {
        session_start();
        $view = new PlatView();
        $view->afficher();
    }

    public static function affichePageTenrac(): void
    {
        session_start();
        $view = new PlatTenracView();
        $view->afficher();
    }


    /**
     * Recherche des plats en fonction du nom donné et affiche les ingrédients.
     *
     * Cette méthode permet de rechercher des plats dont le nom correspond à une recherche partielle.
     * Elle affiche également les ingrédients associés à chaque plat trouvé.
     *
     * @param string $nomRecherche Le nom partiel du plat à rechercher.
     *
     * @return void
     */
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


    /**
     * Génère et affiche une liste de plats avec leurs ingrédients.
     *
     * Cette méthode récupère tous les plats disponibles et affiche les ingrédients associés à chaque plat.
     *
     * @return void
     */
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
            echo '</p>     <button onclick="modifierPlat()">Modifier</button>
            <form action="/delete-plat" method="POST"><input type="hidden" name="action" value="delete">
            <button type="submit" name="delete" value="'.$idx.'">Supprimer le club</button></form><br></div>';
        }
    }

    /**
     * Ajoute un nouveau plat à la base de données.
     *
     * Cette méthode traite une requête POST contenant le nom du plat et l'ingrédient associé,
     * puis ajoute le plat à la base de données.
     *
     * @return void
     */
    public function addPlat(): void{
        if ($_SERVER["REQUEST_METHOD"] === "POST" AND $_POST['action'] === 'add') {
            $nomPlat = $_POST['nom'];
            $nomIngredient = $_POST['ingr'];
            $platModel = new PlatModel(new DbConnect());
            $platModel->addPlat($nomPlat,$nomIngredient);
        }
    }


    /**
     * Récupère la liste des ingrédients et génère un menu déroulant pour les sélectionner.
     *
     * Cette méthode affiche une liste déroulante (select) des ingrédients disponibles.
     *
     * @return void
     */
    public function recupIngredient(): void
    {
        $platmodel = new PlatModel((new DbConnect()));
        $ingredientS = $platmodel->listerIngredient();
        echo '<select value="add" id="ingredient" name="ingr" required>';
        echo '<option value="">Sélectionnez un ingrédient</option>';
        foreach ($ingredientS as $ingr){
            $tmp = implode(",",$ingr);
            echo  '<option value="ingredient1">'.$tmp.'</option>';
        }
        echo "</select>";
    }

    public function deletePlat(): void{
        if($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'delete'){
            $platdeleted = $_POST['delete'];
            $platmodel = new PlatModel(new DbConnect());
            $platmodel->deletePlat($platdeleted);
            self::affichePage();
            exit();
        }
    }
}