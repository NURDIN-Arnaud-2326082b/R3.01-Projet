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


    public function deconnexion() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();

        session_destroy();

        header("Location: connexion.php");
        exit();
    }





}


?>
