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
}