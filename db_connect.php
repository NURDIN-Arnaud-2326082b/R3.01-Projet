<?php
$servername = "mysql-loeb.alwaysdata.net";
$username = "loeb";
$password = "aC.2c2pxkzr4*qu";
$dbname = "loeb_tenrac";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}
else {
    echo "Connexion réussie";
}
?>
