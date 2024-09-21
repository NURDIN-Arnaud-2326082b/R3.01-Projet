<?php
global $conn;
$css_files = "Structure.css";

include __DIR__ . '/../controllers/header.php';
include __DIR__ . '/../controllers/footer.php';
header_page("Structure", $css_files);

require_once '../models/db_connect.php'; // Connexion à la base de données
require_once '../models/StructureModel.php'; // Modèle d'utilisateur pour la gestion des structures.
require_once '../controllers/StructureController.php'; // Contrôleur d'utilisateur

// Crée une instance de StructureModel
$structureModel = new StructureModel($conn);

// Crée une instance de TenracController avec les deux modèles
$structureController = new StructureController($structureModel); // Vérifie que $userModel est défini ou n'est pas utilisé si pas nécessaire
?>

    <div class="slider">
        <img  class="slider-background" alt="Image de raclette" src="../../../img/raclette.webp" >
        <div class="slider-content">
            <h1>La structure des Tenracs</h1>
            <p>Un vrai petit monde de passionnés</p>
        </div>
    </div>

    <div id="gestionStructure">
        <form action="" method="post">
            <h3>Ajouter un Club</h3>
            <p>Nom du Club : </p> <input type="text" name="nom"><br>
            <p>Adresse : </p> <input type="text" name="adr"><br>
            <p>Club Père : </p> <input type="text" name="pere"><br>
            <input type="submit" name="action" value="J'ajoute !">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == "J'ajoute !") {
            // Récupérer les données du formulaire
            $Nom = $_POST['nom'];
            $Adresse = $_POST['adr'];
            $Nom_club_Pere = $_POST['pere'];

            // Chercher l'id du club père
            $Id_pere = 'SELECT Id_club FROM Ordre_et_Club WHERE nom_club = \'' . $Nom_club_Pere . '\'';

            // Création d'une variable contenant le nouveau club.
            $newStructure = [
                'Id_pere' => $Id_pere,
                'Nom_club' => $Nom,
                'Adresse' => $Adresse
            ];

            // Appel à la méthode addStructure
            $structureController->addStructure($newStructure);
        }
        ?>

        <form>
            <h3>Modifier un Club</h3>
        </form>
        <form>
            <h3>Supprimer un Club</h3>
        </form>
    </div>

    <div id="ordre_tenrac">
        <h2>L'Ordre</h2>
        <p id="sous_titre">Le royaume des Tenrac</p>
        <p>Description</p>
    </div>

    <div id ="autres_clubs">
        <h2>Autres clubs</h2>
        <div class="descri_club">
            <h3>NomClub</h3>
            <p>Adresse</p>
        </div>

        <div class="descri_club">
            <h3>Club</h3>
            <p>Adresse</p>
        </div>

        <div class="descri_club">
            <h3>Club</h3>
            <p>Adresse</p>
        </div>

        <div class="descri_club">
            <h3>Club</h3>
            <p>Adresse</p>
        </div>

    </div>

<?php
footer_page();
?>