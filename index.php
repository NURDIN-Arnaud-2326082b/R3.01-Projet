<?php
// Obtenez l'URL demandée et nettoyez-la
$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Route vers la page d'accueil si l'URL demandée est la racine ou "/index.php"
if ($request_uri == '' || $request_uri == 'index.php') {
    require __DIR__ . '/modules/blog/views/homepage.php';
} else {
    // Autres routes
    switch ($request_uri) {
        case '/structure':
            require __DIR__ . '/modules/blog/views/structure.php';
            break;
        case '/repas':
            require __DIR__ . '/modules/blog/views/repas.php';
            break;
        case '/plat':
            require __DIR__ . '/modules/blog/views/plat.php';
            break;
        case '/connexion':
            require __DIR__ . '/modules/blog/views/connexion.php';
            break;
        case '/repasTenrac':
            require __DIR__ . '/modules/blog/views/repasTenrac.php';
            break;
        case '/structureTenrac':
            require __DIR__ . '/modules/blog/views/structureTenrac.php';
            break;
        case '/platTenrac':
            require __DIR__ . '/modules/blog/views/platTenrac.php';
            break;
        case '/ajoutTenrac':
            require __DIR__ . '/modules/blog/views/gestionTenrac.php';
            break;
        default:
            // Si aucune route ne correspond, affiche une page d'erreur 404
            echo 'Erreur 404 - Page non trouvée';
            break;
    }
}
?>
