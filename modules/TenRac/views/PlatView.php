<?php

namespace TenRac\views;

use TenRac\controllers\PlatController;


/**
 * Class PlatView
 *
 * Représente la vue pour la page de plat.
 * Elle hérite de la classe abstraite AbstractView et définit les
 * méthodes nécessaires pour afficher le contenu spécifique à
 * la page de plat.
 */
class PlatView extends AbstractView
{

    /**
     * Définit le corps de la vue en incluant les fichiers
     * de contenu relatifs à la page de plat.
     *
     * Si une recherche est effectuée via le formulaire,
     * elle appelle la méthode `recherche` du PlatController.
     * Sinon, elle génère la liste des plats.
     *
     * @return void
     */
    protected function body(): void
    {
        include __DIR__ . '/plat.php';
        $platcontroller = new PlatController();
        if(isset($_POST['recherche'])){
            $platcontroller->recherche($_POST['recherche']);
        }
        else{
            $platcontroller->generer();
        }
        include __DIR__ . '/platpart2.php';
        $platcontroller->recupIngredient();
        include __DIR__ . '/platpart3.php';

    }

    /**
     * Retourne la feuille de style CSS à utiliser pour la page de plat.
     *
     * @return string Le chemin vers la feuille de style CSS.
     */
    function css(): string
    {
        return 'Plat.css';
    }

    /**
     * Retourne le titre de la page de plat.
     *
     * @return string Le titre de la page.
     */
    function pageTitle(): string
    {
        return 'Plat';
    }
}