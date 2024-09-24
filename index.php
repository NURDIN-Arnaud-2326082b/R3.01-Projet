<?php
session_start();
include __DIR__ . '/Autoloader.php';

use TenRac\controllers\ConnexionController;
use TenRac\controllers\HomePageController;
use TenRac\controllers\StructureController;
use TenRac\controllers\StructureTenracController;


$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($request_uri == '' || $request_uri == 'index.php') {

    $homePage = new HomePageController();
    $homePage::affichePage();
} else {
    // Autres routes
    switch ($request_uri) {
        case 'structure':
            $structure = new StructureController();
            $structure::affichePage();
            break;
        case '/repas':
            require __DIR__ . '/modules/TenRac/views/repas.php';
            break;
        case 'plat':
            $platpage = new \TenRac\controllers\PlatController();
            $platpage::affichePage();
            break;
        case 'connexion':
            $connexionPage = new ConnexionController();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connexionPage::connecter($_POST);
            }
            // If POST
                // $connexionPage::connecter($_POST);
            // Else
            $connexionPage::affichePage();
            break;
        case '/repasTenrac':
            require __DIR__ . '/modules/TenRac/views/repasTenrac.php';
            break;
        case 'structureTenrac':
            $structureTenrac = new StructureTenracController();
            $structureTenrac::affichePage();
            if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == "add") {
                $structureTenrac::addStructure();
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == "delete"){
                $structureTenrac::deleteStructure();
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == "update"){
                $structureTenrac::updateStructure();
            }
            break;
        case '/platTenrac':
            require __DIR__ . '/modules/TenRac/views/platTenrac.php';
            break;
        case 'ajout-tenrac':
            $tenrac = new \TenRac\controllers\GestionTenracController();
            $tenrac ->ajouterTenrac();
            break;
        case 'suppression-tenrac':
            $tenrac = new \TenRac\controllers\GestionTenracController();
            $tenrac ->supprimerTenrac();
        case 'home':
            $homePage = new HomePageController();
            $homePage::affichePage();
            break;
        default:
            echo 'Erreur 404 - Page non trouvée';
            break;
    }
}
?>
