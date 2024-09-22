<?php
$page_title = "Oublie de mot de passe";
$css_files = "connexion.css";
global $conn;
require_once __DIR__ . '/../controllers/footer.php';
require_once __DIR__ . '/../controllers/header.php';
header_page($page_title, $css_files);
require_once '../models/db_connect.php';
require_once '../models/TenracModel.php';
require_once '../controllers/TenracController.php';

// Créez une instance du modèle et du contrôleur
$userModel = new TenracModel($conn);
$userController = new TenracController($userModel, $conn);
?>

<body>
<form method="post" action="">
    <h1>Se connecter</h1>
    <label for="email">Adresse e-mail</label>
    <input type="email" id="email" name="email" placeholder="Votre email" required>
    <input type="submit" value="Avoir un nouveau mot de passe">
</form>

<?php if(isset($_POST['email'])){
    $newPassword = uniqid();
    $hashedpassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $message = "Voici votre nouveau mot de passe : " . $newPassword;
    if (mail($_POST['email'], 'Oublie de mot de passe', $message)) {
        $sql = "UPDATE Tenrac SET Code_personnel = ? WHERE Courriel = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $hashedpassword , $_POST['email']);
    }
} ?>

<?php
footer_page();
?>
