<?php
require_once '../models/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $plat_id = isset($_POST['plat_id']) ? (int)$_POST['plat_id'] : 0;

    if ($plat_id > 0) {
        $stmt = $conn->prepare("SELECT * FROM Plat WHERE Id_Plat = ?");
        $stmt->bind_param("i", $plat_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $plat = $result->fetch_assoc();
            echo "<h1>Modifier le plat</h1>";
            echo "<p>Nom du plat: " . htmlspecialchars($plat['nom']) . "</p>";
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
