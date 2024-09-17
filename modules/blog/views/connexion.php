<?php
$page_title = "Connexion";
$css_files = "connexion.css";
include __DIR__ . '/../controllers/header.php';
include __DIR__ . '/../controllers/footer.php';
header_page($page_title, $css_files);
require_once '../models/db_connect.php'; // Connexion à la base de données
require_once '../models/TenracModel.php'; // Modèle d'utilisateur
require_once '../controllers/TenracController.php'; // Contrôleur d'utilisateur

// Créez une instance du modèle et du contrôleur
$userModel = new TenracModel($conn);
$userController = new TenracController($userModel);

// Appel de la méthode de connexion
$userController->login();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
<h1>Se connecter</h1>
<form method="post" action="">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Se connecter">
</form>

<?php
footer_page();
?>
