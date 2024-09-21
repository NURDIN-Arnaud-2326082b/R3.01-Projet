<?php

/*
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: connexion.php");
    exit();
}*/

global $conn, $userModel;
$page_title = "ajoutTenrac";
$css_files = "connexion.css";
require_once __DIR__ . '/../controllers/header.php';
require_once __DIR__ . '/../controllers/footer.php';
header_page($page_title, $css_files);
require_once '../models/db_connect.php'; // Connexion à la base de données
require_once '../models/TenracModel.php'; // Modèle d'utilisateur
require_once '../controllers/TenracController.php'; // Contrôleur d'utilisateur

// Crée une instance de TenracModel
$tenracModel = new TenracModel($conn);

// Crée une instance de TenracController avec les deux modèles
$userController = new TenracController($userModel, $tenracModel); // Vérifie que $userModel est défini ou n'est pas utilisé si pas nécessaire


?>

<form action="" method="POST">
    <input type="hidden" name="action" value="ajout">
    <label for="Courriel">Email : </label>
    <input type="email" name="Courriel" required><br>
    <label for="Code_personnel"> Mot de passe : </label>
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'ajout') {
    // Récupérer les données du formulaire
    $newTenrac = [
        'Courriel' => $_POST['Courriel'],
        'Code_personnel' => $_POST['Code_personnel'],
        'Nom' => $_POST['Nom'],
        'Num_tel' => $_POST['Num_tel'],
        'Adresse' => $_POST['Adresse'],
        'Grade' => $_POST['Grade'],
        'Rang' => $_POST['Rang'],
        'Titre' => $_POST['Titre'],
        'Dignite' => $_POST['Dignite'],
        'Id_club' => $_POST['Id_club']
    ];
    // Appel à la méthode ajouterTenrac
    $userController->ajouterTenrac($newTenrac);
}
?>
<form action="" method="POST">
    <input type="hidden" name="action" value="suppression">
    <label for="Courriel">Email : </label>
    <input type="email" name="Courriel" required><br>
    <button type="submit">Supprimer Tenrac</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"&& $_POST['action'] == 'suppression') {
    // Récupérer les données du formulaire
    $tenracSuppr =  $_POST['Courriel'];
    // Appel à la méthode ajouterTenrac
    $userController->supprimerTenrac($tenracSuppr);
}
?>

<?php
footer_page();
?>


