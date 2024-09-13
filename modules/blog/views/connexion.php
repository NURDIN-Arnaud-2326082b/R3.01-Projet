<?php

// Inclure le fichier de connexion à la base de données
require 'db_connect.php';

// Vérifier si la requête est en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire

    $email = htmlspecialchars($_POST["email"]);
    $motdepasse = $_POST["motdepasse"];

    // Vérifier que tous les champs sont remplis
    if (!empty($email) && !empty($motdepasse)) {

        // Hachage du mot de passe
        $hashed_password = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Vérifier si l'email existe déjà

        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<p>Cette adresse e-mail est déjà utilisée.</p>";
        } else {
            // Si l'email n'existe pas, insérer l'utilisateur
            $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $email, $hashed_password);

            // Exécuter la requête et vérifier si elle a réussi
            if ($stmt->execute()) {
                echo "<p>Votre inscription a été réalisée avec succès.</p>";
            } else {
                echo "<p>Erreur lors de l'inscription : " . $stmt->error . "</p>";
            }
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();

    } else {
        echo "<p>Veuillez remplir tous les champs du formulaire.</p>";
    }
}
require 'HT.php';

start_page('connexion');

end_page('connexion');
?>

