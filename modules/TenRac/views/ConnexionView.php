<?php
namespace TenRac\views;


/**
 * Class ConnexionView
 *
 * Représente la vue pour la page de connexion de l'utilisateur.
 * Elle hérite de la classe abstraite AbstractView et définit les
 * méthodes nécessaires pour afficher le contenu spécifique à
 * la page de connexion.
 */
class ConnexionView extends AbstractView
{

    /**
     * Affiche le contenu de la page de connexion.
     *
     * @return void
     */
    protected function body(): void
    {
        include __DIR__ . '/connexion.php';
    }

    /**
     * Retourne le chemin vers la feuille de style CSS à utiliser.
     *
     * @return string Le chemin vers la feuille de style CSS.
     */
    function css(): string
    {
        return 'connexion.css';
    }

    /**
     * Retourne le titre de la page à afficher dans le header.
     *
     * @return string Le titre de la page.
     */
    function pageTitle(): string
    {
        return 'Connexion';
    }
}