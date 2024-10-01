<?php

namespace  TenRac\controllers;
use TenRac\models\StructureTenracModel;
use TenRac\models\DbConnect;
use TenRac\views\StructureTenracView;


/**
 * Contrôleur pour la gestion des structures (clubs) dans l'application.
 *
 * Ce contrôleur permet d'afficher, d'ajouter, de supprimer et de modifier des structures (clubs)
 * ainsi que de gérer leurs adhérents.
 *
 * @package TenRac\controllers
 */
class StructureTenracController
{

    /**
     * Génère et affiche la liste des structures (clubs) avec des formulaires pour modifier ou supprimer chaque club.
     *
     * Cette méthode interagit avec le modèle `StructureTenracModel` pour récupérer les informations sur les clubs,
     * et affiche des formulaires permettant de modifier ou supprimer chaque club.
     *
     * @return void
     */
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
            <button type="submit" name="delete" value="'.$id.'">Supprimer le club</button></form><br>
            
            <form action="/tenrac-structure" method="POST"><input type="hidden" name="action" value="rejoindre">
            <button type="submit" name="rejoindre" value="'.$id.'">Rejoindre le club</button></form>
            </div>';
        }
    }


    /**
     * Affiche la page des structures.
     *
     * Cette méthode démarre une session et utilise la vue `StructureTenracView` pour afficher la page des clubs.
     *
     * @return void
     */
    public static function affichePage(): void
    {
        session_start();
        $view = new StructureTenracView();
        $view->afficher();
    }

    
    /**
     * Ajoute un tenrac dans un club.
     *
     * Si la requête est POST et que l'action est 'rejoindre', cette méthode modifie le club d'un tenrac.
     *
     * @return void
     */
    public function ajouterTenracClub(): void{
        if($_SERVER['REQUEST_METHOD'] === 'POST' AND $_POST['action'] === 'rejoindre') {
            $idClub = $_POST['rejoindre'];
            $idTenrac = 'je ne sais pas comment récupérer cela. :/';
            $structureModel = new StructureTenracModel(new DbConnect());
            $structureModel->ajouterTenracClub($idClub, $idTenrac);
            self::affichePage();
            exit();
        }
    }


    /**
     * Ajoute une nouvelle structure (club) à la base de données.
     *
     * Si la requête est POST et que l'action est 'add', cette méthode ajoute un nouveau club avec son nom et son adresse.
     *
     * @return void
     */
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


    /**
     * Supprime une structure (club) de la base de données.
     *
     * Si la requête est POST et que l'action est 'delete', cette méthode supprime le club sélectionné,
     * sauf si le club est "L'Ordre", qui ne peut pas être supprimé.
     *
     * @return void
     */
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


    /**
     * Met à jour les informations d'une structure (club) dans la base de données.
     *
     * Si la requête est POST et que l'action est 'update', cette méthode met à jour le nom et l'adresse
     * du club sélectionné, sauf pour "L'Ordre" dont le nom ne peut pas être changé.
     *
     * @return void
     */
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