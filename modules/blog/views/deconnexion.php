<?php
$_SESSION['loggedin'] = true;
global $conn;
$page_title = "Déconnexion";
$css_files = "connexion.css";

require_once __DIR__ . '/../controllers/footer.php';
require_once __DIR__ . '/../controllers/header.php';
require_once '../models/db_connect.php';
require_once '../models/TenracModel.php';
require_once '../controllers/TenracController.php';
header_page($page_title, $css_files);

session_start();
session_unset();  // Supprime toutes les variables de session
session_destroy();

// Redirige vers la page d'accueil
header("Location: homepage.php");
exit();
?>