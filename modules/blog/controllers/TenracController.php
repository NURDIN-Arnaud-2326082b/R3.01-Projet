<?php
require_once '../models/db_connect.php';
require_once '../models/TenracModel.php';

class TenracController
{
    protected $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $courriel = htmlspecialchars($_POST["email"]);
            $password = $_POST["password"];

            if (!empty($courriel) && !empty($password)) {
                if ($this->userModel->verifyTenrac($courriel, $password)) {
                    echo "Connexion réussie !";
                    header("Location: /index.php");
                    exit();
                } else {
                    echo "Erreur de connexion : Email ou mot de passe incorrect.";
                }
            }
        }
    }
}
?>
