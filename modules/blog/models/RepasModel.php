<?php


$pdo = new PDO('mysql:host=localhost;dbname=ma_base', 'utilisateur', 'mot_de_passe');
$stmt = $pdo->prepare('SELECT Dates FROM Repas WHERE id = ?');
$stmt->execute([1]);
$resultat = $stmt->fetch();
$date_base = $resultat['Dates'];

$date_aujourdhui = date("d/m/Y");
class RepasModel{
protected $conn;

public function __construct($conn)
{
    $this->conn = $conn;


$rep=  "INSERT INTO Repas (Id_Repas,Dates,Gerant,Courriel,Id_lieu) VALUES (?,?,?,?,?)";

if ($conn->query($rep) === TRUE) {
echo "Nouveau Repas";
} else {
echo "Erreur : " . $rep . "<br>" . $rep->error;
}

$rep->close();
$sql = $this->conn->prepare("SELECT * FROM Repas WHERE Gerant IN (?);");
    $result = $rep->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ($row["Gerant"] != NULL) {
               return True;
            }
        }
    }
    else{
        return False;
    }

    $rep->close();
}

}?>