<?php

namespace TenRac\controllers;
use TenRac\models\DbConnect;
use TenRac\models\GestionTenracModel;
use TenRac\views\GestionTenracView;

/**
 * Contrôleur pour la gestion des utilisateurs (Tenracs).
 *
 * Cette classe permet d'afficher la page de gestion des Tenracs,
 * ainsi que d'ajouter, supprimer et modifier un utilisateur.
 *
 * @package TenRac\controllers
 */
class GestionTenracController
{

    /**
     * Affiche la page de gestion des Tenracs.
     *
     * Cette méthode démarre une session utilisateur et affiche la vue de gestion des Tenracs.
     *
     * @return void
     */
    public static function affichePage(): void{
        session_start();
        $view = new GestionTenracView();
        $view->afficher();
    }


    /**
     * Ajoute un nouvel utilisateur Tenrac dans la base de données.
     *
     * Cette méthode récupère les informations d'un Tenrac via une requête POST,
     * les envoie au modèle pour les ajouter dans la base de données,
     * envoie un email de bienvenue, puis redirige vers la page d'accueil.
     *
     * @return void
     */
    public function ajouterTenrac(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newTenrac = [
                'Courriel' => $_POST['Courriel'],
                'Code_personnel' => $_POST['Code_personnel'],
                'Nom' => $_POST['Nom'],
                'Num_tel' => $_POST['Num_tel'],
                'Adresse' => $_POST['Adresse'],
                'Grade' => $_POST['Grade'],
                'Rang' => $_POST['Rang'],
                'Titre' => $_POST['Titre'],
                'Dignite' => $_POST['Dignite'],
                'Id_club' => $_POST['Id_club']
            ];

            $tenracModel = new GestionTenracModel(new DbConnect());
            $tenracModel->ajouterTenrac(
                $newTenrac['Courriel'],
                $newTenrac['Code_personnel'],
                $newTenrac['Nom'],
                $newTenrac['Num_tel'],
                $newTenrac['Adresse'],
                $newTenrac['Grade'],
                $newTenrac['Rang'],
                $newTenrac['Titre'],
                $newTenrac['Dignite'],
                $newTenrac['Id_club']
            );
            mail($newTenrac['Courriel'], 'Nouveau membre', 'Bienvenue dans la communaute des tenracs ! Votre identifiant et cette adresse mail et le mot de passe est : ' . $newTenrac['Code_personnel']);
            header('Location: /index.php');
            exit();
        }

    }

    /**
     * Supprime un utilisateur Tenrac de la base de données.
     *
     * Cette méthode récupère le courriel d'un Tenrac via une requête POST
     * et le supprime de la base de données si l'utilisateur est trouvé.
     *
     * @return void
     */
    public function supprimerTenrac(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenracSuppr =  $_POST['Courriel'];

            $tenracModel = new GestionTenracModel(new DbConnect());
            if ($tenracModel){
                $tenracModel->supprimerTenrac($tenracSuppr);
                header('Location: /index.php');
                exit();
            } else {
                echo "Tenrac non trouvé.";
        }
        }
    }

    /**
     * Modifie les informations d'un utilisateur Tenrac.
     *
     * Cette méthode récupère les informations mises à jour d'un Tenrac via une requête POST,
     * puis appelle le modèle pour effectuer la modification dans la base de données.
     * Redirige ensuite vers la page d'accueil.
     *
     * @return void
     */
    public function modifierTenrac(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $tenracModif = [
                'Courriel' => $_POST['Courriel'] ?? null,
                'Code_personnel' => $_POST['Code_personnel'] ?? null,
                'Nom' => $_POST['Nom'] ?? null,
                'Num_tel' => $_POST['Num_tel'] ?? null,
                'Adresse' => $_POST['Adresse'] ?? null,
                'Grade' => $_POST['Grade'] ?? null,
                'Rang' => $_POST['Rang'] ?? null,
                'Titre' => $_POST['Titre'] ?? null,
                'Dignite' => $_POST['Dignite'] ?? null,
                'Id_club' => $_POST['Id_club'] ?? null
            ];

            $tenracModel = new GestionTenracModel(new DbConnect());

                $tenracModel->modifierTenrac(
                    $tenracModif['Courriel'],
                    $tenracModif['Code_personnel'],
                    $tenracModif['Nom'],
                    $tenracModif['Num_tel'],
                    $tenracModif['Adresse'],
                    $tenracModif['Grade'],
                    $tenracModif['Rang'],
                    $tenracModif['Titre'],
                    $tenracModif['Dignite'],
                    $tenracModif['Id_club']
                );
                header('Location: /index.php');
                exit();
            }
        }

}