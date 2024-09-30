<?php
namespace TenRac\views;

use Override;
use TenRac\views\Header\HeaderView;

/**
 * Class HomePageView
 *
 * Représente la vue pour la page d'accueil.
 * Elle hérite de la classe abstraite AbstractView et définit les
 * méthodes nécessaires pour afficher le contenu spécifique à
 * la page d'accueil.
 */
class HomePageView extends AbstractView
{
    /**
     * Affiche le contenu de la page d'accueil.
     *
     * @return void
     */
    protected function body(): void
    {
        include __DIR__ . '/homepage.php';
    }

    /**
     * Retourne le chemin vers la feuille de style CSS à utiliser.
     *
     * @return string Le chemin vers la feuille de style CSS.
     */
    function css(): string
    {
        return 'style.css';
    }

    /**
     * Retourne le titre de la page à afficher dans le header.
     *
     * @return string Le titre de la page.
     */
    function pageTitle(): string
    {
        return 'Accueil';
    }

    /**
     * Affiche le contenu de la page d'accueil.
     *
     * @return void
     */
    #[Override] public function afficher(): void
    {
        parent::afficher();
    }
}