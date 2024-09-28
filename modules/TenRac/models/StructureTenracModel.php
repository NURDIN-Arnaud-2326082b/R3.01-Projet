<?php

namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;
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
    public function addStructure($Id_Pere, $Nom_Club, $Adresse): void
    {
        $idPere = $this->connect->mysqli()->prepare($Id_Pere);

        $sql = "INSERT INTO Ordre_et_club(Id_pere, Nom_club, Adresse) VALUES (?, ?, ?)";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('iss', $idPere, $Nom_Club, $Adresse);
        if($stmt->execute()){
            echo 'Ajout réussi';
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
            echo 'Suppresion réussie';
        }else{
            echo 'Erreur de suppresion' . $stmt->error;
        }
        $stmt->close();
    }

    public function updateStructure($Id_Club, $Id_Pere, $Nom_Club, $Adresse): void
    {
        $idPere = $this->connect->mysqli()->prepare($Id_Pere);
        $idClub = $this->connect->mysqli()->prepare($Id_Club);

        $sql = "UPDATE Ordre_et_club SET Id_pere = ?, Nom_club = ?, Adresse = ? WHERE Id_club = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('issi', $idPere, $Nom_Club, $Adresse, $idClub);
        if($stmt->execute()){
            echo 'Modification réussie';
        }else{
            echo 'Erreur de modification' . $stmt->error;
        }
        $stmt->close();
    }
}
?>