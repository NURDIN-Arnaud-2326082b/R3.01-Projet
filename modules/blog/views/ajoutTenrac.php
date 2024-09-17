
<?php
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

?>

<form action="index.php?controller=tenrac&action=ajouterTenrac" method="POST">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" required><br>
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    <label for="telephone">Téléphone:</label>
    <input type="text" name="telephone" required><br>
    <label for="adresse">Adresse:</label>
    <input type="text" name="adresse" required><br>
    <label for="grade">Grade:</label>
    <input type="text" name="grade" required><br>
    <button type="submit">Ajouter Tenrac</button>
</form>

<?php $userController->ajouterTenrac();?>