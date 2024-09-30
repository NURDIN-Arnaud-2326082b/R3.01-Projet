<?php
namespace TenRac\models;

use mysqli;

/**
 * Classe de connexion à la base de données.
 *
 * Cette classe gère l'établissement de la connexion à une base de données MySQL
 * en utilisant l'extension MySQLi. Elle fournit également un accès à l'objet
 * de connexion pour les autres classes du modèle.
 *
 * @package TenRac\models
 */
class DbConnect
{

    private mysqli $conn;

    /**
     * Constructeur de la classe DbConnect.
     *
     * Initialise une connexion à la base de données MySQL avec les paramètres
     * spécifiés. Si la connexion échoue, un message d'erreur est affiché et
     * l'exécution est arrêtée.
     *
     * @throws Exception Si la connexion à la base de données échoue.
     */
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


    /**
     * Retourne l'objet de connexion MySQLi.
     *
     * Cette méthode permet d'accéder à l'objet de connexion pour l'exécution
     * de requêtes sur la base de données.
     *
     * @return mysqli L'objet de connexion à la base de données.
     */
    public function mysqli(): mysqli
    {
        return $this->conn;
    }
}