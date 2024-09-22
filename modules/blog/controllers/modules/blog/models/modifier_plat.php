<?php
// Inclure le fichier de connexion
require_once '../models/db_connect.php'; // Connexion à la base de données

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID du plat sélectionné
    $plat_id = isset($_POST['plat_id']) ? (int)$_POST['plat_id'] : 0;

    if ($plat_id > 0) {
        // Préparer et exécuter la requête pour récupérer les détails du plat sélectionné
        $stmt = $conn->prepare("SELECT * FROM Plat WHERE Id_Plat = ?");
        $stmt->bind_param("i", $plat_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $plat = $result->fetch_assoc();
            // Afficher les informations du plat ou permettre à l'utilisateur de le modifier
            echo "<h1>Modifier le plat</h1>";
            echo "<p>Nom du plat: " . htmlspecialchars($plat['nom']) . "</p>";
            // Ici tu pourrais ajouter un formulaire pour modifier les détails du plat
        } else {
            echo "Plat non trouvé.";
        }

        $stmt->close();
    } else {
        echo "ID du plat invalide.";
    }
}

$conn->close();
?>
