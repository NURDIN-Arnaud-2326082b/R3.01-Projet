<?php
global $conn;
$css_files = "structure.css";

include __DIR__ . '/../controllers/header.php';
include __DIR__ . '/../controllers/footer.php';
header_page("Structure", $css_files);

require_once '../models/db_connect.php';
require_once '../models/StructureTenracModel.php';
require_once '../controllers/StructureTenracController.php';

$structureModel = new StructureModel($conn);

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
        <form action="" method="POST">
            <h3>Ajouter un Club</h3>
            <input type="hidden" name="action" value="add">
            <p>Nom du Club : </p> <input type="text" name="nom"><br>
            <p>Adresse : </p> <input type="text" name="adr"><br>
            <p>Club Père : </p> <input type="text" name="pere"><br>
            <button type="submit">J'ajoute !</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == "add") {
            $Nom = $_POST['nom'];
            $Adresse = $_POST['adr'];
            $Nom_club_Pere = $_POST['pere'];

            $Id_pere = 'SELECT Id_club FROM Ordre_et_Club WHERE nom_club = \'' . $Nom_club_Pere . '\'';

            $newStructure = [
                'Id_pere' => $Id_pere,
                'Nom_club' => $Nom,
                'Adresse' => $Adresse
            ];

            $structureController->addStructure($newStructure);
        }
        ?>

        <form action="" method="post">
            <h3>Modifier un Club</h3>
            <input type="hidden" name="action" value="update">
            <p>Identifiant du Club :</p><input type="text" name="idClub">
            <p>Nouveau nom :</p><input type="text" name="nom2">
            <p>Nouvelle adresse :</p><input type="text" name="adr2">
            <p>Nouveau club père :</p><input type="text" name="idPere">
            <button type="submit">P'tit coup de neuf !</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == "update") {
            $updateStructure = [
                'Id_club' => $_POST['idClub'],
                'Id_pere' => $_POST['idPere'],
                'Nom_club' => $_POST['nom2'],
                'Adresse' => $_POST['adr2'],
            ];

            $structureController->updateStructure($updateStructure);
        }
        ?>


        <form action="" method="POST">
            <h3>Supprimer un Club</h3>
            <input type="hidden" name="action" value="delete">
            <p>Identifiant du Club : </p> <input type="text" name="id"><br>
            <!--<p>Adresse : </p> <input type="text" name="adr2"><br>-->
            <button type="submit">Et ça dégage !</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == "delete") {
            $Id = $_POST['id'];
            //$Adresse = $_POST['adr2'];

            //$Id_club = 'SELECT id_club FROM Ordre_et_Club WHERE nom_club = \'' . $Nom . '\' AND Adresse = \'' . $Adresse . '\'';

            $structureController->deleteStructure($Id);
        }
        ?>
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