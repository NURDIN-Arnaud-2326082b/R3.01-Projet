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

    public function afficherFormulaireAjout() {
        include 'views/ajoutTenrac.php';
    }

    // Action pour ajouter un tenrac
    public function ajouterTenrac() {
        if (isset($_POST['nom'])) {
            $this->TenracModel->ajouterTenrac($_POST['Courriel'], $_POST['Code_personnel'], $_POST['Num_tel'], $_POST['Adresse'], $_POST['Grade'],  $_POST['Rang'], $_POST['Titre'], $_POST['Dignite'], $_POST['Id_club']);
            header('Location: index.php?controller=tenrac&action=lister');
        }
    }

}


?>
