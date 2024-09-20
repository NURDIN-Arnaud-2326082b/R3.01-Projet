<?php
require_once '../models/db_connect.php';
require_once '../models/TenracModel.php';
require_once '../views/ajoutTenrac.php';

class TenracController
{
    protected $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    public function login(): void
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $courriel = htmlspecialchars($_POST["email"]);
            $password = $_POST["password"];

            if (!empty($courriel) && !empty($password)) {
                if ($this->userModel->verifyTenrac($courriel, $password)) {
                    header("Location: /index.php");
                    exit();
                } else {
                    echo"Erreur de connexion : Email ou mot de passe incorrect.";
                }
            }
        }
    }

    // Action pour ajouter un tenrac
    public function ajouterTenrac($newTenrac): void {
        if (isset($_POST['nom'])) {
            $this->TenracModel->ajouterTenrac($_POST[$newTenrac[0]], $_POST[$newTenrac[1]],$_POST[$newTenrac[2]], $_POST[$newTenrac[3]], $_POST[$newTenrac[4]], $_POST[$newTenrac[5]],  $_POST[$newTenrac[6]], $_POST[$newTenrac[7]], $_POST[$newTenrac[8]], $_POST[$newTenrac[9]]);
        }
    }

}


?>
