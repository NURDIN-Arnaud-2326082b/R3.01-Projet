<?php
$servername = "mysql-tenracc.alwaysdata.net";
$user = "tenracc";
$password = "tenraclette";
$dbname = "tenracc_bd";

// Créer une connexion
$conn = new mysqli($servername,$user,$password, $dbname);


// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}
else {
    echo "Connexion réussie";
}
?>
