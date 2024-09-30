<?php

namespace TenRac\models;

use TenRac\models\DbConnect;


/**
 * Class StructureModel
 *
 * Cette classe gère les interactions avec la base de données concernant les clubs et les tenracs.
 */
class StructureModel
{

    /**
     * StructureModel constructor.
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


    /**
     * Cherche l'adresse d'un club par son identifiant.
     *
     * @param int $id L'identifiant du club.
     * @return array Un tableau contenant l'adresse du club.
     */
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
     * Cherche les tenracs associés à un club par son identifiant.
     *
     * @param int $id L'identifiant du club.
     * @return array Un tableau contenant les noms des tenracs associés au club.
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
}