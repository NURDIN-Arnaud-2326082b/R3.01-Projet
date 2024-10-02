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
        $loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
        if ($loggedin == true) {
            $platmodel = new PlatModel(new DbConnect());
            $plats = $platmodel->creerListe();
            foreach ($plats as $plat) {
                $plt = implode(", ", $plat);


                echo '<form id="listeplat" action="/update-plat" method="POST">
             <input type="text" name="action" value="update" hidden="hidden">
             <input type="text" name="nom" value="' . $plt .'"><br>';
                $index = $platmodel->chercheIdPlat($plt);
                $ingredients = $platmodel->trouverIngredient((int)$index);
                $cpt = 1;

                foreach ($ingredients as $ingredient) {
                    $listeingredients = $platmodel->listerIngredient();
                    $ing = implode(",",$ingredient);
                    $idxingr = $platmodel->chercheIdIngredient($ing);

                    if ($idxingr == 1){
                        echo '<p>FROMAGE À RACLETTE</p><br>';
                    }
                    else {
                        echo '<select value="add"  id="ingredient" name="ingr'.$cpt.'">';
                        echo '<option value="'.$idxingr.'"name="ingr'.$cpt.'">'.$ing.'</option>';

                        foreach ($listeingredients as $ingr){
                            $tmp = implode(",",$ingr);
                            $idxingr = $platmodel->chercheIdIngredient($tmp);
                            echo  '<option value="'.$idxingr.'"name="ingr'.$cpt.'">'.$tmp.'</option>';
                        }
                        echo '</select><br>';
                        $cpt = $cpt + 1 ;
                    }
                }
                echo '<button type="submit" name="update" value="' . $index . '">Modifier le plat</button></form>
            <form action="/delete-plat" method="POST"><input type="hidden" name="action" value="delete">
            <button type="submit" name="delete" value="' . $index . '">Supprimer le plat</button></form>';
            }
            echo '</div></div></div>';
        }
        else {
            $platmodel = new PlatModel(new DbConnect());
            $plats = $platmodel->creerListe();
            foreach ($plats as $plat) {
                $plt = implode(", ", $plat);
                echo '<div id="listeplat"><p>' . $plt . "<br>";
                $index = $platmodel->chercheIdPlat($plt);
                $idx = $index;
                $ingredients = $platmodel->trouverIngredient((int)$idx);
                foreach ($ingredients as $ingredient) {
                    echo implode(",", $ingredient) . "<br>";
                }
                echo '</p><br></div>';
            }
            echo '</div></div></div>';
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
            if (isset($_POST['ingr1'])) {
                $ingredients[0] = $_POST['ingr1'];
            }
            else{
                $ingredients[0] = null;
            }
            if (isset($_POST['ingr2'])) {
                $ingredients[1] = $_POST['ingr2'];
            }
            else{
                $ingredients[1] = null;
            }
            if (isset($_POST['ingr3'])) {
                $ingredients[2] = $_POST['ingr3'];
            }
            else{
                $ingredients[2] = null;
            }
            if (isset($_POST['ingr4'])) {
                $ingredients[3] = $_POST['ingr4'];
            }
            else{
                $ingredients[3] = null;
            }
            if (isset($_POST['ingr5'])) {
                $ingredients[4] = $_POST['ingr5'];
            }
            else{
                $ingredients[4] = null;
            }
            $platModel = new PlatModel(new DbConnect());
            $img = $_POST['choix'];
            $platModel->addPlat($nomPlat,$ingredients,$img);
        }
    }


    /**
     * Récupère la liste des ingrédients et génère un menu déroulant pour les sélectionner.
     *
     * Cette méthode affiche une liste déroulante (select) des ingrédients disponibles.
     *
     * @return void
     */
    public function recupIngredient($cpt): void
    {
        $platmodel = new PlatModel((new DbConnect()));
        $ingredientS = $platmodel->listerIngredient();
        echo '<select value="add" id="ingredient" name="ingr'.$cpt.'" required>';
        if ($cpt != 1){
            echo '<option value="0" name="ingr'.$cpt.'">Sélectionnez un ingrédient</option>';
            foreach ($ingredientS as $ingr){
                $tmp = implode(",",$ingr);
                $idx = $platmodel->chercheIdIngredient($tmp);
                var_dump($idx);
                echo  '<option value="'.$idx.'">'.$tmp.'</option>';
            }
            echo "</select><br>";
        }
        else {
            echo '<option value="1"name="ingr'.$cpt.'">FROMAGE À RACLETTE</option></select><br>';
        }
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


    public function updatePlat(): void{
        if ($_SERVER["REQUEST_METHOD"] === "POST" and $_POST['action'] === 'update') {
            $idPlat = $_POST['update'];
            $img = $_POST['choix'];
            $nomPlat = $_POST['nom'];
            if (isset($_POST['ingr1'])) {
                $ingredients[0] = $_POST['ingr1'];
            }
            else{
                $ingredients[0] = null;
            }
            if (isset($_POST['ingr2'])) {
                $ingredients[1] = $_POST['ingr2'];
            }
            else{
                $ingredients[1] = null;
            }
            if (isset($_POST['ingr3'])) {
                $ingredients[2] = $_POST['ingr3'];
            }
            else{
                $ingredients[2] = null;
            }
            if (isset($_POST['ingr4'])) {
                $ingredients[3] = $_POST['ingr4'];
            }
            else{
                $ingredients[3] = null;
            }
            if (isset($_POST['ingr5'])) {
                $ingredients[4] = $_POST['ingr5'];
            }
            else{
                $ingredients[4] = null;
            }
            $PlatModel = new PlatModel(new DbConnect());
            $PlatModel->updatePlat($idPlat, $nomPlat,$ingredients,$img);
            self::affichePage();
            exit();
        }
    }
}