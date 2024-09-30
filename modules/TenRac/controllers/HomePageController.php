<?php

namespace TenRac\controllers;
use TenRac\views\HomePageView;


/**
 * Contrôleur pour la page d'accueil.
 *
 * Cette classe permet d'afficher la page d'accueil du site.
 *
 * @package TenRac\controllers
 */
class HomePageController
{

    /**
     * Affiche la page d'accueil.
     *
     * Cette méthode démarre une session utilisateur (si elle n'est pas déjà démarrée)
     * et affiche la vue associée à la page d'accueil.
     *
     * @return void
     */
    public static function affichePage():void
    {
        session_start();
        $view = new HomePageView();
        $view->afficher();
    }
}