<?php
namespace TenRac\views;


/**
 * Class GestionTenracView
 *
 * Représente la vue pour la page de gestion des TenRac.
 * Elle hérite de la classe abstraite AbstractView et définit les
 * méthodes nécessaires pour afficher le contenu spécifique à
 * la page de gestion des TenRac.
 */
class GestionTenracView extends AbstractView
{

    /**
     * Affiche le contenu de la page de gestion des TenRac.
     *
     * @return void
     */
    protected function body(): void
    {
        include __DIR__ . '/gestionTenrac.php';
    }

    /**
     * Retourne le chemin vers la feuille de style CSS à utiliser.
     *
     * @return string Le chemin vers la feuille de style CSS.
     */
    function css(): string
    {
        return 'AjoutTenrac.css';
    }

    /**
     * Retourne le titre de la page à afficher dans le header.
     *
     * @return string Le titre de la page.
     */
    function pageTitle(): string
    {
        return 'Gestion Tenrac';
    }
}