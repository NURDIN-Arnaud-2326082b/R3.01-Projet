<?php
$servername = "mysql-tenracc.alwaysdata.net";
$username = "tenracc";
$password = "tenraclette";
$dbname = "tenracc_bd";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error)
{
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}
else
{
   // echo "Connexion réussie à la base de données.";
}
?>
