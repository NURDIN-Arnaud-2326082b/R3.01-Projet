<?php

/*
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: connexion.php");
    exit();
}*/

$page_title = "ajoutTenrac";
$css_files = "connexion.css";
include __DIR__ . '/../controllers/header.php';
header_page($page_title, $css_files);
require_once '../models/db_connect.php'; // Connexion à la base de données
require_once '../models/TenracModel.php'; // Modèle d'utilisateur
require_once '../controllers/TenracController.php'; // Contrôleur d'utilisateur

// Créez une instance du modèle et du contrôleur
$userModel = new TenracModel($conn);
$userController = new TenracController($userModel);

// Créer une liste pour tnouveau tenrac
$newtenrac = [];

?>

<form action="" method="POST">
    <label for="Courriel">Email : </label>
    <input type="email" name="Courriel" required><br>
    <label for="Code_personnel"> code : </label>
    <input type="text" property="hash" name="Code_personnel" required><br>
    <label for="Nom">Nom : </label>
    <input type="text" name="Nom" required><br>
    <label for="Num_tel">Numéro tel : </label>
    <input type="text" name="Num_tel" required><br>
    <label for="Adresse"> Adresse : </label>
    <input type="text" name="Adresse" required><br>
    <label for="Grade"> Grade : </label>
    <input type="text" name="Grade" required><br>
    <label for="Rang">Rang : </label>
    <input type="text" name="Rang" required><br>
    <label for="Titre">Titre : </label>
    <input type="text" name="Titre" required><br>
    <label for="Dignite"> Dignite : </label>
    <input type="text" name="Dignite" required><br>
    <label for="Id_club"> Club : </label>
    <input type="number" name="Id_club" required><br>
    <button type="submit">Ajouter Tenrac</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $Courriel = $_POST['Courriel'];
    $Code_personnel = $_POST['Code_personnel'];
    $Nom = $_POST['Nom'];
    $Num_tel = $_POST['Num_tel'];
    $Adresse = $_POST['Adresse'];
    $Grade = $_POST['Grade'];
    $Rang = $_POST['Rang'];
    $Titre = $_POST['Titre'];
    $Dignite = $_POST['Dignite'];
    $Id_club = $_POST['Id_club'];

    // Stocker les données dans une liste (tableau associatif)
    $newTenrac = [
        'Courriel' => $Courriel,
        'Code_personnel' => $Code_personnel,
        'Nom' => $Nom,
        'Num_tel' => $Num_tel,
        'Adresse' => $Adresse,
        'Grade' => $Grade,
        'Rang' => $Rang,
        'Titre' => $Titre,
        'Dignite' => $Dignite,
        'Id_club' => $Id_club
    ];
}
$userController->ajouterTenrac($newTenrac);
?>


