<?php

namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;
use PDO;
use TenRac\models\DbConnect;


/**
 * Class StructureTenracModel
 *
 * Cette classe gère les interactions avec la base de données concernant les structures de tenrac.
 */
class StructureTenracModel{


    /**
     * StructureTenracModel constructor.
     *
     * @param DbConnect $connect Instance de la classe DbConnect pour gérer la connexion à la base de données.
     */
    public function __construct(private DbConnect $connect)
    {
    }

    /**
     * Récupère la liste des identifiants des clubs.
     *
     * @return array Un tableau contenant les identifiants des clubs.
     */
    public function listeClub(){
        $stmt = $this->connect->mysqli()->query("SELECT Id_club FROM Ordre_et_club");

        if(!$stmt){
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        $data = [];
        while ($row = $stmt->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->free();
        return $data;
    }


    /**
     * Cherche le nom d'un club par son identifiant.
     *
     * @param int $id L'identifiant du club.
     * @return array Un tableau contenant le nom du club.
     */
    public function chercheNom(int $id){
        $stmt = $this->connect->mysqli()->prepare("SELECT DISTINCT Nom_club FROM Ordre_et_club WHERE Id_club =?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->free();
        return $data;
    }

    public function chercheAdresse(int $id){
        $stmt = $this->connect->mysqli()->prepare("SELECT DISTINCT Adresse FROM Ordre_et_club WHERE Id_club =?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->free();
        return $data;
    }


    /**
     * Cherche l'adresse d'un club par son identifiant.
     *
     * @param int $id L'identifiant du club.
     * @return array Un tableau contenant l'adresse du club.
     */
    public function chercheTenrac(int $id){
        $stmt = $this->connect->mysqli()->prepare("SELECT DISTINCT Nom FROM Tenrac WHERE Id_club =?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->free();
        return $data;
    }



    /**
     * Ajoute une nouvelle structure à la base de données.
     *
     * @param string $Nom_Club Le nom du club.
     * @param string $Adresse L'adresse du club.
     * @return void
     */
    public function addStructure($Nom_Club, $Adresse): void
    {
        $sql = "INSERT INTO Ordre_et_club(Id_pere, Nom_club, Adresse) VALUES (1, ?, ?)";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('ss', $Nom_Club, $Adresse);
        if($stmt->execute()){
            //echo 'Ajout réussi';
        }else{
            echo 'Erreur d\'ajout' . $stmt->error;
        }
        $stmt->close();
    }



    /**
     * Change l'identifiant du club pour les tenracs.
     *
     * @param int $Id_club L'identifiant du club à changer.
     * @return void
     */
    public function changerClubTenrac($Id_club): void{
        $sql = "UPDATE Tenrac SET Id_club = 1 WHERE Id_club = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('i', $Id_club);
        if($stmt->execute()){
            //echo 'Modification tenrac réussie.
        } else{
            echo 'Erreur de modification du club des tenracs' . $stmt->error;
        }
        $stmt->close();
    }

    /**
     * Supprime une structure de la base de données.
     *
     * @param int $Id_club L'identifiant du club à supprimer.
     * @return void
     */
    public function deleteStructure($Id_club): void
    {
        $sql = "DELETE FROM Ordre_et_club WHERE Id_club = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('i', $Id_club);
        if($stmt->execute()){
            //echo 'Suppresion réussie';
        }else{
            echo 'Erreur de suppresion' . $stmt->error;
        }
        $stmt->close();
    }


    /**
     * Met à jour les informations d'une structure existante.
     *
     * @param int $Id_Club L'identifiant du club à mettre à jour.
     * @param string $Nom_Club Le nouveau nom du club.
     * @param string $Adresse La nouvelle adresse du club.
     * @return void
     */
    public function updateStructure($Id_Club, $Nom_Club, $Adresse): void
    {
        $sql = "UPDATE Ordre_et_club SET Nom_club = ?, Adresse = ? WHERE Id_club = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('ssi', $Nom_Club, $Adresse, $Id_Club);
        if($stmt->execute()){
            //echo 'Modification réussie';
        }else{
            echo 'Erreur de modification' . $stmt->error;
        }
        $stmt->close();
    }
}
?>