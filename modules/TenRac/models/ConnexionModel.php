<?php

namespace TenRac\models;

use TenRac\models\DbConnect;

class ConnexionModel
{
    public function __construct(private DbConnect $connect)
    {
    }

    public function login($courriel, $password): bool
    {
        $stmt = $this->connect->mysqli()->prepare("SELECT Nom, Code_personnel FROM Tenrac WHERE courriel = ?");
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("s", $courriel);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_nom, $db_password);
            $stmt->fetch();

            if (password_verify($password, $db_password)) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['courriel'] = $courriel;
                $_SESSION['nom'] = $db_nom;

                $stmt->close();
                return true;
            }
        }

        $stmt->close();
        return false;
    }


    public function logout(): void
    {
        session_start();
        session_unset();
        session_destroy();
        header('Location: /');
    }


//    public function verifyTenrac($courriel, $password)
//    {
//        $stmt = $this->connect->mysqli()->prepare("SELECT Nom, Code_personnel FROM Tenrac WHERE courriel = ?");
//        if (!$stmt) {
//            echo "Erreur de requête: " . $this->conn->error . "\n";
//            return false;
//        }
//        $stmt->bind_param("s", $courriel);
//        $stmt->execute();
//        $stmt->store_result();
//
//        if ($stmt->num_rows > 0) {
//            $db_password = '';
//            $db_nom = '';
//            $stmt->bind_result($db_nom,$db_password);
//            $stmt->fetch();
//
//
//            if (password_verify($password, $db_password)) {
//                $_SESSION['loggedin'] = true;
//                return true;
//            }
//        }
//
//        $stmt->close();
//        return false;
//    }

}