<?php
namespace TenRac\models;

use mysqli;

class DbConnect
{

    private mysqli $conn;
    public function __construct()
    {
        $servername = "mysql-tenracc.alwaysdata.net";
        $username = "tenracc";
        $password = "tenraclette";
        $dbname = "tenracc_bd";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ( $this->conn->connect_error)
        {
            die("La connexion à la base de données a échoué: " .  $this->conn->connect_error);
        }
        else
        {
            // echo "Connexion réussie à la base de données.";
        }
    }

    public function mysqli(): mysqli
    {
        return $this->conn;
    }
}