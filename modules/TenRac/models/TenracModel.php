<?php
require 'db_connect.php';
class TenracModel
{
    protected $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function verifyTenrac($courriel, $password)
    {
        $stmt = $this->conn->prepare("SELECT Nom, Code_personnel FROM Tenrac WHERE courriel = ?");
        if (!$stmt) {
            echo "Erreur de requête: " . $this->conn->error . "\n";
            return false;
        }
        $stmt->bind_param("s", $courriel);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $db_password = '';
            $db_nom = '';
            $stmt->bind_result($db_nom,$db_password);
            $stmt->fetch();


            if (password_verify($password, $db_password)) {
                $_SESSION['loggedin'] = true;
                return true;
            }
        }

        $stmt->close();
        return false;
    }

}
?>
