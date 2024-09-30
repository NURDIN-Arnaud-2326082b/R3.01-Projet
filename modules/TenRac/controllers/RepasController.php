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
     * Affiche la liste des repas disponibles.
     *
     * Cette méthode est destinée à afficher la liste complète des repas dans l'application.
     *
     * @return void
     */
    public static function afficheListeRepas(): void
    {

    }


    /**
     * Affiche un seul repas.
     *
     * Cette méthode est destinée à afficher les détails d'un repas unique.
     *
     * @return void
     */
    public static function afficheUnRepas(): void
    {

    }



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
                'Id_lieu' => $_POST['Id_lieu']
            ];

            $tenracModel = new RepasModel(new DbConnect());
            $tenracModel->ajouterTenrac(
                $newRepas['Dates'],
                $newRepas['Gerant'],
                $newRepas['Id_lieu']
            );
            header('Location: /index.php');
            exit();
        }

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
        $dbConnect= new DbConnect();
        $repasModel = RepasModel::unSeulRepas($dbConnect, 1,2);

        $view = new RepasView(
            $repasModel->Verifdate($dbConnect),
            $repasModel->getLieu($dbConnect),
            $repasModel->getPlat($dbConnect)
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
    public static function Verifdate(){
        $dbConnection = new DbConnect();
        return $dateExists = RepasModel::Verifdate($dbConnection);
    }

}?>