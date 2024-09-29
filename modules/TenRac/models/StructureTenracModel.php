<?php

namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;
use PDO;
use TenRac\models\DbConnect;

class StructureTenracModel{

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



    /*
     * @author Manon VERHILLE
     * @version 1.0
     * @params L'id du club duquel il découle, le nom du club et l'adresse.
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