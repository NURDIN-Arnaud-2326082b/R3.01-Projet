<?php
require_once '../models/db_connect.php';
require_once '../models/TenracModel.php';

#[AllowDynamicProperties] class TenracController
{
    protected $userModel;
    private $tenracModel;


    public function __construct($userModel, $tenracModel)
    {
        $this->userModel = $userModel;
        $this->tenracModel = $tenracModel;
    }

    public function login(): void
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $courriel = htmlspecialchars($_POST["email"]);
            $password = htmlspecialchars($_POST["password"]);

            if (!empty($courriel) && !empty($password)) {
                if ($this->userModel->verifyTenrac($courriel, $password)) {
                    $_SESSION['header_link'] = 'plattenrac.php';
                    header("Location: /index.php");
                    exit();
                } else {
                    echo"Erreur de connexion : Email ou mot de passe incorrect.";
                }
            }
        }
    }

    public function afficherFormulaireAjout(): void
    {
        include '../views/gestionTenrac.php';
    }

    public function ajouterTenrac($newTenrac): void
    {
        if ($this->tenracModel) {
            $this->tenracModel->ajouterTenrac(
                $newTenrac['Id'],
                $newTenrac['Courriel'],
                $newTenrac['Code_personnel'],
                $newTenrac['Nom'],
                $newTenrac['Num_tel'],
                $newTenrac['Adresse'],
                $newTenrac['Grade'],
                $newTenrac['Rang'],
                $newTenrac['Titre'],
                $newTenrac['Dignite'],
                $newTenrac['Id_club']
            );
            header('Location: /index.php');
            exit();
        } else {
            echo "Le modèle n'est pas initialisé.";
        }
    }

    public function supprimerTenrac($tenracSuppr): void
    {
        if ($this->tenracModel){
            $this->tenracModel->supprimerTenrac($tenracSuppr);
            header('Location: /index.php');
            exit();
        } else {
            echo "Tenrac non trouvé.";
        }
    }

    public function modifierTenrac($newTenrac): void
    {
        if ($this->tenracModel){
            $this->tenracModel->modifierTenrac(
                $newTenrac['Courriel'],
                $newTenrac['Code_personnel'],
                $newTenrac['Nom'],
                $newTenrac['Num_tel'],
                $newTenrac['Adresse'],
                $newTenrac['Grade'],
                $newTenrac['Rang'],
                $newTenrac['Titre'],
                $newTenrac['Dignite'],
                $newTenrac['Id_club']
            );
            header('Location: /index.php');
            exit();
        } else {
            echo "Tenrac non trouvé.";
        }
    }


    public function deconnexion() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Détruire toutes les variables de session
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header("Location: connexion.php");
        exit();
    }





}


?>
