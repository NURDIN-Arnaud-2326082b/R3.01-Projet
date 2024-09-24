<?php
//$_SESSION['loggedin'] = true;
//
//global $conn;
//$page_title = "Connexion";
//$css_files = "connexion.css";
//
//require_once __DIR__ . '/../controllers/footer.php';
//require_once __DIR__ . '/../controllers/header.php';
//require_once '../models/db_connect.php';
//require_once '../models/TenracModel.php';
//require_once '../controllers/TenracController.php';
//header_page($page_title, $css_files);
//
//$userModel = new TenracModel($conn);
//$userController = new TenracController($userModel, $conn);
//
//$userController->login();
//?>

<form method="post" action="/connexion">
    <h1>Se connecter</h1>
    <label for="email">Adresse e-mail</label>
    <input type="email" id="email" name="email" placeholder="Votre email" required>

    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>

    <input type="submit" value="Se connecter">

    <a href="motDePasseOublier.php/">Mot de passe oublié</a>
</form>
