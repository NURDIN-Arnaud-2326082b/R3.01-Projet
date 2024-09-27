<?php

namespace TenRac\views;
namespace TenRac\controllers;
namespace TenRac\models;
class RechercheModel
{

    public function __construct(private DbConnect $connect){}

    public function lancerRecherche(): void
    {

        if(isset($_POST['recherche']) && !empty($_POST)) {
            $sql = "SELECT Nom_plat FROM Plat WHERE Nom_plat LIKE ?";
            $stmt = $this->connect->mysqli()->prepare($sql);
            $stmt->bind_param('d', $dateJour);
            $stmt->execute();
            $result = $stmt->store_result();
            echo $result;

        } else {
                die('Veuillez saisir quelque chose dans le champs de recherche.');
            }
    }

}