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

    public function cherhceIdPlat(string $nom){
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
}