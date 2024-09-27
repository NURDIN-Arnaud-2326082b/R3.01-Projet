<?php

namespace TenRac\models;

use TenRac\models\DbConnect;

class PlatModel
{
    public function __construct(private DbConnect $connect)
    {
    }

    public function creerListe()
    {
        $stmt = $this->connect->mysqli()->query("SELECT Nom_plat FROM Plat");

        // Vérification du résultat
        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        // Extraction des résultats sous forme de tableau
        $data = [];
        while ($row = $stmt->fetch_assoc()) {
            $data[] = $row;
        }

        // Libération du résultat
        $stmt->free();
        return $data;
    }

    public function trouverIngredient(int $id){
        $stmt = $this->connect->mysqli()->prepare("SELECT Nom_ingredient FROM Ingrédients t1 JOIN IngredientsPlat tj ON t1.Id_ingredient = tj.Id_ingredient JOIN Plat t2 ON tj.Id_Plat = t2.Id_Plat WHERE t2.Id_Plat =?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Vérification du résultat
        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        // Extraction des résultats sous forme de tableau
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Libération du résultat
        $result->free();
        return $data;
    }

    public function chercheIdPlat(string $nom){
        $stmt = $this->connect->mysqli()->prepare("SELECT Id_Plat FROM Plat WHERE Nom_plat =?");
        $stmt->bind_param("s", $nom);
        $stmt->execute();
        $result = $stmt->get_result();

        // Vérification du résultat
        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        // Extraction des résultats sous forme de tableau
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Libération du résultat
        $result->free();
        return $data;
    }

    public function chercheIdIngredient(string $nom){
        $stmt = $this->connect->mysqli()->prepare("SELECT Id_Ingredient FROM Ingrédients WHERE Nom_ingredient =?");
        $stmt->bind_param("s", $nom);
        $stmt->execute();
        $result = $stmt->get_result();

        // Vérification du résultat
        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        // Extraction des résultats sous forme de tableau
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Libération du résultat
        $result->free();
        return $data;
    }

    public function listerIngredient(){
        $stmt = $this->connect->mysqli()->query("SELECT Nom_ingredient FROM Ingrédients");
        // Vérification du résultat
        if (!$stmt) {
            die("Erreur lors de l'exécution de la requête : " . $this->mysqli->error);
        }

        // Extraction des résultats sous forme de tableau
        $data = [];
        while ($row = $stmt->fetch_assoc()) {
            $data[] = $row;
        }

        // Libération du résultat
        $stmt->free();
        return $data;
    }

    public function addPlat($nomPlat,$nomIngredient): void
    {
        $sql = "INSERT INTO Plat(Nom_Plat) VALUES (?)";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('s', $nomPlat);
        $sql2 = "INSERT INTO IngredientsPlat(Id_Plat,Id_ingredient) VALUES (?,?)";
        $idPlat = chercheIdPlat($nomPlat);
        $idIngredient = chercheIdIngredient($nomIngredient);
        $stmt2 = $this->connect->mysqli()->prepare($sql2);
        $stmt2->bind_param('ii', $idPlat,$idIngredient);

        if($stmt->execute()){
            echo 'Ajout réussi';
        }else{
            echo 'Erreur d\'ajout' . $stmt->error;
        }
        $stmt->close();
    }
}