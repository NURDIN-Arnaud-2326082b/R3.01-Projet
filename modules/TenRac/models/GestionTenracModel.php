<?php

namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;
use TenRac\models\DbConnect;


/**
 * Classe de gestion des opérations sur les membres 'Tenrac'.
 *
 * Cette classe fournit des méthodes pour ajouter, supprimer et modifier
 * les enregistrements des membres 'Tenrac' dans la base de données.
 *
 * @package TenRac\models
 */
class GestionTenracModel
{

    /**
     * Constructeur de la classe GestionTenracModel.
     *
     * Initialise une instance de la classe avec une connexion à la base de données.
     *
     * @param DbConnect $connect Instance de la classe DbConnect pour la connexion à la base de données.
     */
    public function __construct(private DbConnect $connect)
    {

    }


    /**
     * Ajoute un membre 'Tenrac' à la base de données.
     *
     * @param string $Courriel L'adresse e-mail du membre.
     * @param string $Code_personnel Le code personnel du membre.
     * @param string $Nom Le nom du membre.
     * @param string $Num_tel Le numéro de téléphone du membre.
     * @param string $Adresse L'adresse du membre.
     * @param string $Grade Le grade du membre.
     * @param string $Rang Le rang du membre.
     * @param string $Titre Le titre du membre.
     * @param string $Dignite La dignité du membre.
     * @param string $Id_club L'identifiant du club auquel le membre appartient.
     *
     * @return void
     */
    public function ajouterTenrac($Courriel, $Code_personnel, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club): void
    {
        $hashed_password = password_hash($Code_personnel, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Tenrac ( Courriel, Code_personnel, Nom, Num_tel, Adresse, Grade, Rang, Titre, Dignite, Id_club) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param("ssssssssss", $Courriel, $hashed_password, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club);

        if ($stmt->execute()) {
            echo "Ajout réussi";
        } else {
            echo "Erreur lors de l'ajout: " . $stmt->error;
        }

        $stmt->close();
    }



    /**
     * Supprime un membre 'Tenrac' de la base de données.
     *
     * @param string $Courriel L'adresse e-mail du membre à supprimer.
     *
     * @return void
     */
    public function supprimerTenrac($Courriel): void
    {
        $sql = "DELETE FROM Tenrac WHERE  Courriel = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt -> bind_param('s', $Courriel);
        if ($stmt->execute()) {
            echo 'Suppression réussi';
        } else {
            echo "Erreur lors de la suppression: " . $stmt->error;
        }
    }


    /**
     * Modifie les informations d'un membre 'Tenrac' dans la base de données.
     *
     * @param string $Courriel L'adresse e-mail du membre à modifier.
     * @param string $Code_personnel Le nouveau code personnel du membre.
     * @param string $Nom Le nouveau nom du membre.
     * @param string $Num_tel Le nouveau numéro de téléphone du membre.
     * @param string $Adresse La nouvelle adresse du membre.
     * @param string $Grade Le nouveau grade du membre.
     * @param string $Rang Le nouveau rang du membre.
     * @param string $Titre Le nouveau titre du membre.
     * @param string $Dignite La nouvelle dignité du membre.
     * @param string $Id_club Le nouvel identifiant du club auquel le membre appartient.
     *
     * @return void
     */
    public function modifierTenrac($Courriel, $Code_personnel, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club): void
    {

        $hashed_password = password_hash($Code_personnel, PASSWORD_DEFAULT);

        $sql = "UPDATE Tenrac SET Code_personnel = ?, Nom = ?, Num_tel = ?, Adresse = ?, Grade = ?, Rang = ?, Titre = ?, Dignite = ?, Id_club = ? WHERE Courriel = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param("ssssssssss", $hashed_password, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club, $Courriel);
        if ($stmt->execute()) {
            echo "Modification réussie";
        } else {
            echo "Erreur lors de la modification: " . $stmt->error;
        }
        $stmt->close();
    }
}