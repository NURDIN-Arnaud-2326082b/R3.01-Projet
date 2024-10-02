<?php

namespace TenRac\models;

use TenRac\models\DbConnect;


/**
 * Classe pour gérer les opérations liées aux plats.
 *
 * Cette classe fournit des méthodes pour créer des listes de plats, rechercher des plats par ingrédients,
 * et ajouter de nouveaux plats dans la base de données.
 *
 * @package TenRac\models
 */
class PlatModel
{

    /**
     * Constructeur de la classe PlatModel.
     *
     * Initialise une instance de la classe avec une connexion à la base de données.
     *
     * @param DbConnect $connect Instance de la classe DbConnect pour la connexion à la base de données.
     */
    public function __construct(private DbConnect $connect)
    {
    }


    /**
     * Crée une liste de tous les plats disponibles.
     *
     * @return array Tableau contenant les noms des plats.
     */
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


    /**
     * Crée une liste de plats en fonction d'une recherche par ingrédient.
     *
     * @param string $recherche Le nom de l'ingrédient à rechercher.
     * @return array Tableau contenant les noms des plats associés à l'ingrédient recherché.
     */
    public function creerListeSelonRecherche($recherche)
    {
        $recherche = "%" . $recherche . "%";

        $stmt = $this->connect->mysqli()->prepare("SELECT Nom_plat  FROM Plat JOIN IngredientsPlat ON Plat.Id_Plat = IngredientsPlat.Id_Plat JOIN Ingrédients ON IngredientsPlat.Id_ingredient = Ingrédients.Id_ingredient WHERE Nom_ingredient LIKE ?");

        $stmt->bind_param('s', $recherche);
        $stmt->execute();

        $result = $stmt->get_result();
        if (!$result) {
            die("Erreur lors de l'exécution de la requête : " . $this->connect->mysqli()->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->free_result();
        $stmt->close();

        return $data;
    }



    /**
     * Trouve les ingrédients d'un plat donné par son ID.
     *
     * @param int $id L'ID du plat.
     * @return array Tableau contenant les noms des ingrédients associés au plat.
     */
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


    /**
     * Cherche l'ID d'un plat en fonction de son nom.
     *
     * @param string $nom Le nom du plat.
     * @return array Tableau contenant l'ID du plat.
     */
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
        return $data[0]['Id_Plat'];
    }


    /**
     * Cherche l'ID d'un ingrédient en fonction de son nom.
     *
     * @param string $nom Le nom de l'ingrédient.
     * @return array Tableau contenant l'ID de l'ingrédient.
     */
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
        return $data[0]["Id_Ingredient"];
    }


    /**
     * Liste tous les ingrédients disponibles.
     *
     * @return array Tableau contenant les noms des ingrédients.
     */
    public function listerIngredient(){
        $stmt = $this->connect->mysqli()->query("SELECT Nom_ingredient FROM Ingrédients WHERE Id_Ingredient != 1");
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


    /**
     * Ajoute un nouveau plat avec son ingrédient associé.
     *
     * @param string $nomPlat Le nom du plat à ajouter.
     * @param string $nomIngredient Le nom de l'ingrédient à associer au plat.
     *
     * @return void
     */
    public function addPlat($nomPlat,$ingredients): void
    {
        $sql = "INSERT INTO Plat(Nom_Plat) VALUES (?)";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('s', $nomPlat);
        $stmt->execute();
        $stmt->close();
        for ($i = 0; $i < 5; $i++){
            if($ingredients[$i] != 0){
                $sql2 = "INSERT INTO IngredientsPlat(Id_Plat,Id_ingredient) VALUES (?,?)";
                $idPlat = $this->chercheIdPlat($nomPlat);
                $stmt2 = $this->connect->mysqli()->prepare($sql2);
                $id = intval($ingredients[$i]);
                $stmt2->bind_param('ii', $idPlat,$id);
                $stmt2->execute();
                $stmt2->close();
            }
        }
    }

    public function deletePlat($Id_plat): void
    {
        $sql = "DELETE FROM Plat WHERE Id_Plat= ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('i', $Id_plat);
        if(!($stmt->execute())){
            echo 'Erreur de suppresion dans plat' . $stmt->error;
        }
        $stmt->close();
        $sql2 = "DELETE FROM IngredientsPlat WHERE Id_Plat= ?";
        $stmt2 = $this->connect->mysqli()->prepare($sql2);
        $stmt2->bind_param('i', $Id_plat);
        if(!($stmt2->execute())){
            echo 'Erreur de suppresion dans ingrédientPlat' . $stmt2->error;
        }
        $stmt2->close();
    }

    public function updatePlat($IdPlat,$NomPlat,$ingredients): void
    {
        $sql = "UPDATE Plat SET Nom_plat = ? WHERE Id_Plat = ?";
        $stmt = $this->connect->mysqli()->prepare($sql);
        $stmt->bind_param('si', $NomPlat, $IdPlat);
        if(!($stmt->execute())){
            echo 'Erreur de modification' . $stmt->error;
        }
        $stmt->close();
        $sql2 = "DELETE FROM IngredientsPlat WHERE Id_Plat= ?";
        $stmt2 = $this->connect->mysqli()->prepare($sql2);
        $stmt2->bind_param('i', $IdPlat);
        $stmt2->execute();
        $stmt2->close();
        for ($i = 0; $i < 5; $i++){
            if(!(is_null($ingredients[$i]))){
                $sql2 = "INSERT INTO IngredientsPlat(Id_Plat,Id_ingredient) VALUES (?,?)";
                $idPlat = $this->chercheIdPlat($NomPlat);
                $stmt2 = $this->connect->mysqli()->prepare($sql2);
                $id = intval($ingredients[$i]);
                $stmt2->bind_param('ii', $idPlat,$id);
                $stmt2->execute();
                $stmt2->close();
            }
        }
    }

    /**
     * Liste tous les ingrédients disponibles.
     *
     * @return array Tableau contenant les noms des ingrédients.
     */
}