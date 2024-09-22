<?php
require 'db_connect.php';

class StructureModel{

    protected $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    /*
     * @author Manon VERHILLE
     * @version 1.0
     * @params L'id du club duquel il découle, le nom du club et l'adresse.
     */
    public function addStructure($Id_Pere, $Nom_Club, $Adresse)
    {
        $sql = "INSERT INTO Ordre_et_club(Id_Pere, Nom_club, Adresse) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $Id_Pere, $Nom_Club, $Adresse);
        if($stmt->execute()){
            echo "Ajout réussi";
        }else{
            echo "Erreur d'ajout" . $stmt->error;
        }
    }

    public function deleteStructure()
    {
        //TODO
    }

    public function updateStructure()
    {
        //TODO
    }
}

?>