<?php
session_start();
$_SESSION['loggedin'] = true; // Définir cette variable lors de la connexion réussie
//$_SESSION['nom'] = $db_nom; // Éventuellement d'autres informations utilisateur
global $conn;
$page_title = "Connexion";
$css_files = "connexion.css";

include __DIR__ . '/../controllers/footer.php';
include __DIR__ . '/../controllers/header.php';
header_page($page_title, $css_files);
require_once '../models/db_connect.php';
require_once '../models/TenracModel.php';
require_once '../controllers/TenracController.php';

// Créez une instance du modèle et du contrôleur
$userModel = new TenracModel($conn);
$userController = new TenracController($userModel);

// Appel de la méthode de connexion
$userController->login();
?>

<body>
<form method="post" action="">
    <h1>Se connecter</h1>
    <label for="email">Adresse e-mail</label>
    <input type="email" id="email" name="email" placeholder="Votre email" required>

    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

    <input type="submit" value="Se connecter">
</form>

<?php
footer_page();
?>
