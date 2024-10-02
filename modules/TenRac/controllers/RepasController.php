<?php

namespace TenRac\controllers;

use TenRac\models\DbConnect;
use TenRac\models\RepasModel;
use TenRac\views\RepasView;


/**
 * Contrôleur pour gérer les repas dans l'application.
 *
 * Ce contrôleur gère l'affichage, l'ajout, et la validation des repas dans l'application.
 *
 * @package TenRac\controllers
 */
class RepasController{



    /**
     * Ajoute un repas dans la base de données.
     *
     * Cette méthode traite une requête POST pour ajouter un nouveau repas avec ses informations.
     * Elle insère le repas dans la base de données à l'aide du modèle `RepasModel`.
     *
     * @return void
     */
    public function ajouterRepas(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newRepas = [
                'Dates' => $_POST['Dates'],
                'Gerant' => $_POST['Gerant'],
                'Adresse' => $_POST['Adresse']
            ];

            $tenracModel = new RepasModel(new DbConnect());
            $tenracModel->ajoutRepas(
                $newRepas['Dates'],
                $newRepas['Gerant'],
                $newRepas['Adresse']
            );
            exit();
        }

    }

    public function generationHtmlPlat(): String{
        $result = "";
        $repasModel = new RepasModel(new DbConnect());
        $plats = $repasModel->listTousLesRepas();
        foreach ($plats as $plat) {
            $plt = implode(", ", $plat);
            $result = $result . '<div id="listeplat"><p>' . $plt . "<br>";
            $result = $result . "</p></div>";
        }
        return $result;
    }



    /**
     * Affiche la page d'un repas spécifique.
     *
     * Cette méthode démarre une session, récupère les informations d'un repas spécifique et affiche
     * les détails à travers la vue `RepasView`.
     *
     * @return void
     */
    public static function affichePage(): void{
        session_start();
        $repasController = new RepasController();
        $html = $repasController->generationHtmlPlat();
        $repasModel = new RepasModel(new DbConnect());
        $view = new RepasView(
            $repasModel->Verifdate(),
            $repasModel->getLieu(),
            $html
        );
        $view->afficher();
    }


    /**
     * Vérifie la date d'un repas.
     *
     * Cette méthode utilise le modèle `RepasModel` pour vérifier si une date de repas existe.
     *
     * @return mixed La date si elle existe, sinon null.
     */
}?>