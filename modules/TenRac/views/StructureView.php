<?php

namespace TenRac\views;


use TenRac\controllers\StructureController;


/**
 * Class StructureView
 *
 * Représente la vue pour la page de structure Tenrac.
 * Elle hérite de la classe abstraite AbstractView et définit les
 * méthodes nécessaires pour afficher le contenu spécifique à
 * la page de structure.
 */
class StructureView extends AbstractView
{

    /**
     * Définit le corps de la vue en incluant les fichiers
     * de contenu relatifs à la page de structure Tenrac.
     *
     * Elle génère également la liste des structures via le
     * StructureController.
     *
     * @return void
     */
    protected function body(): void
    {
        include __DIR__ . '/structureTenrac.php';
        $structureController = new StructureController();
        $structureController->genererListe();
        echo "</div>";
    }


    /**
     * Retourne la feuille de style CSS à utiliser pour la page de structure.
     *
     * @return string Le chemin vers la feuille de style CSS.
     */
    function css(): string
    {
        return 'structure.css';
    }


    /**
     * Retourne le titre de la page de structure.
     *
     * @return string Le titre de la page.
     */
    function pageTitle(): string
    {
        return 'Structure';
    }


}