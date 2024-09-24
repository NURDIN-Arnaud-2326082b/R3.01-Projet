<?php
session_start();
include __DIR__ . '/Autoloader.php';

use TenRac\controllers\ConnexionController;
use TenRac\controllers\HomePageController;


$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($request_uri == '' || $request_uri == 'index.php') {

    $homePage = new HomePageController();
    $homePage::affichePage();
} else {
    // Autres routes
    switch ($request_uri) {
        case '/structure':
            require __DIR__ . '/modules/TenRac/views/structure.php';
            break;
        case '/repas':
            require __DIR__ . '/modules/TenRac/views/repas.php';
            break;
        case '/plat':
            require __DIR__ . '/modules/TenRac/views/plat.php';
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
        case '/structureTenrac':
            require __DIR__ . '/modules/TenRac/views/structureTenrac.php';
            break;
        case '/platTenrac':
            require __DIR__ . '/modules/TenRac/views/platTenrac.php';
            break;
        case '/ajoutTenrac':
            require __DIR__ . '/modules/TenRac/views/gestionTenrac.php';
            break;
        default:
            echo 'Erreur 404 - Page non trouvée';
            break;
    }
}
?>
