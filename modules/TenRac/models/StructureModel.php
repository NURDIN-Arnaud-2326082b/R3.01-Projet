<?php

namespace TenRac\models;

use TenRac\models\DbConnect;

class StructureModel
{
    public function __construct(private DbConnect $connect)
    {
    }

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