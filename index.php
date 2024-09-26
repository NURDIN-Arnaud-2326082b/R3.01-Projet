<?php
session_start();
include __DIR__ . '/Autoloader.php';

use TenRac\controllers\ConnexionController;
use TenRac\controllers\GestionTenracController;
use TenRac\controllers\HomePageController;
use TenRac\controllers\PlatController;
use TenRac\controllers\StructureController;
use TenRac\controllers\StructureTenracController;
use TenRac\controllers\RepasController;

$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($request_uri == '' || $request_uri == 'index.php') {

    $homePage = new HomePageController();
    $homePage::affichePage();
} else {    // Autres routes
    switch ($request_uri) {
        case 'gestionTenrac':
            $gestionTenrac = new GestionTenracController();
            $gestionTenrac::affichePage();
            break;

        case 'ajout-tenrac':
            $tenrac = new \TenRac\controllers\GestionTenracController();
            $tenrac ->ajouterTenrac();
            break;
        case 'suppression-tenrac':
            $tenrac = new \TenRac\controllers\GestionTenracController();
            $tenrac ->supprimerTenrac();
            break;

        case 'structure':
            $structure = new StructureController();
            $structure::affichePage();
            break;
        case 'structureTenrac':
            $structureTenrac = new StructureTenracController();
            $structureTenrac::affichePage();
            break;
        case 'repas':
            $repas = new RepasController();
            require __DIR__ . '/modules/TenRac/views/repas.php';
            break;
        case 'repasTenrac':
            $repasTenrac = new RepasController();
            require __DIR__ . '/modules/TenRac/views/repasTenrac.php';
            break;
        case 'plat':
            $platpage = new PlatController();
            $platpage::affichePage();
            break;
        case '/platTenrac':
            $platTenrac = new PlatController();
            $platTenrac::affichePage();
            break;
        case 'connexion':
            $connexionPage = new ConnexionController();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connexionPage::connecter($_POST);
            }
            $connexionPage::affichePage();
            break;
        case 'deconnexion':
            $deconnexionPage = new ConnexionController();
            $deconnexionPage::deconnecter();

            $homePage = new HomePageController();
            $homePage::affichePage();
            break;
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
