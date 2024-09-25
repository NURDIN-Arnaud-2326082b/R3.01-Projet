<?php

namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;
use TenRac\models\DbConnect;


class GestionTenracModel
{
    public function __construct(private DbConnect $connect)
    {

    }

    public function ajouterTenrac( $Courriel, $Code_personnel, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club): void
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

    public function modifierTenrac($id, $Courriel, $Code_personnel, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club): void
    {
        $hashed_password = !empty($Code_personnel) ? password_hash($Code_personnel, PASSWORD_DEFAULT) : null;

        if ($hashed_password) {
            $sql = "UPDATE Tenrac SET $Courriel,Code_personnel = ?, Nom = ?, Num_tel = ?, Adresse = ?, Grade = ?, Rang = ?, Titre = ?, Dignite = ?, Id_club = ? WHERE id = ?";
            $stmt = $this->connect->mysqli()->prepare($sql);
            $stmt->bind_param("sssssssssi", $hashed_password, $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club, $id);
        } else {
            $sql = "UPDATE Tenrac SET $Courriel, Nom = ?, Num_tel = ?, Adresse = ?, Grade = ?, Rang = ?, Titre = ?, Dignite = ?, Id_club = ? WHERE id = ?";
            $stmt = $this->connect->mysqli()->prepare($sql);
            $stmt->bind_param("ssssssssi", $Nom, $Num_tel, $Adresse, $Grade, $Rang, $Titre, $Dignite, $Id_club, $id);
        }

        if ($stmt->execute()) {
            echo "Modification réussie";
        } else {
            echo "Erreur lors de la modification: " . $stmt->error;
        }

        $stmt->close();
    }
}