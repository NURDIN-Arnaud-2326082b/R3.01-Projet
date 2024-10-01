<?php
include __DIR__ . '/Autoloader.php';

use TenRac\controllers\ConnexionController;
use TenRac\controllers\GestionTenracController;
use TenRac\controllers\HomePageController;
use TenRac\controllers\MotDePasseOublierController;
use TenRac\controllers\PlatController;
use TenRac\controllers\RechercheController;
use TenRac\controllers\StructureController;
use TenRac\controllers\StructureTenracController;
use TenRac\controllers\RepasController;

$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if ($request_uri == '' || $request_uri == 'index.php') {

    $homePage = new HomePageController();
    $homePage::affichePage();
} else {    // Etude des different url possible
    switch ($request_uri) {

        // Dans le cas ou la page est celle de gestionTenrac
        case 'gestionTenrac':
            // Creation et affichage d'un gestion Tenrac Controller
            $gestionTenrac = new GestionTenracController();
            $gestionTenrac::affichePage();
            break;

        // Dans le cas d'un ajout Tenrac
        case 'ajout-tenrac':
            // On crée un controller tenrac puis on appel la fonction ajoutTenrac
            $tenrac = new \TenRac\controllers\GestionTenracController();
            $tenrac ->ajouterTenrac();
            break;

        // Dans le cas d'un ajout Repas
        case 'ajout-repas':
            // On crée un controller Repas puis on appel la fonction ajoutRepas
            $repas = new RepasController();
            $repas->ajouterRepas();
            break;

        // Dans le cas d'un suppression Tenrac
        case 'suppression-tenrac':
            // On crée un controller tenrac puis on appel la fonction supprimerTenrac
            $tenrac = new \TenRac\controllers\GestionTenracController();
            $tenrac ->supprimerTenrac();
            break;

        // Dans le cas d'un modification Tenrac
        case 'modification-tenrac':
            // On crée un controller tenrac puis on appel la fonction modifierTenrac
            $tenrac = new \TenRac\controllers\GestionTenracController();
            $tenrac ->modifierTenrac();
            break;

        // Dans le cas de l'url /structure
        case 'structure':
            // On crée un controller pour afficher la page
            $structure = new StructureController();
            $structure::affichePage();
            break;

        // Dans le cas de l'url /structureTenrac
        case 'structureTenrac':
            // On créer un controller pour afficher la page
            $structureTenrac = new StructureTenracController();
            $structureTenrac::affichePage();
            break;

        // Dans le cas de add-structure
        case 'add-structure':
            // On crée un controller qui ajoute une structure puis affichera la page
            $structureTenrac = new \TenRac\controllers\StructureTenracController();
            $structureTenrac ->addStructure();
            $structureTenrac::affichePage();
            break;

        // Dans le cas de add-plat
        case 'add-plat' :
            // On crée un controller qui ajoute un plat puis affichera la page
            $platTenrac = new \TenRac\controllers\PlatController();
            $platTenrac ->addPlat();
            $platTenrac::affichePageTenrac();
            break;

        // Dans le cas d'un ajout d'ingrédient
        case 'ajouterIngredient' :
            // On recupere l'ingrédient du controller crée
            $controller = new PlatController();
            $controller->recupIngredient();
            break ;

        // Dans la sitution de delete-structure
        case 'delete-structure':
            // On supprime la structure à l'aide de la fonction deleteStructure du controller puis on effectue l'affichage
            $structureTenrac = new \TenRac\controllers\StructureTenracController();
            $structureTenrac ->deleteStructure();
            $structureTenrac::affichePage();
            break;
        case 'delete-plat' :
            $platTenrac = new \TenRac\controllers\PlatController();
            $platTenrac ->deletePlat();
            $platTenrac::affichePageTenrac();
        // Dans la sitution de update-structure
        case 'update-structure':
            // On modifie la structure à l'aide de la fonction updateStructure du controller puis on effectue l'affichage
            $structureTenrac = new \TenRac\controllers\StructureTenracController();
            $structureTenrac ->updateStructure();
            $structureTenrac::affichePage();
            break;

        // Dans la situation de tenrac-structure
        case 'tenrac-structure':
            // On modifie la structure à l'aide de la fonction ajouterTenracStructure de controller puis on effectue l'affichage.
            $structureTenrac = new StructureTenracController();
            $structureTenrac->ajouterTenracClub();
            $structureTenrac::affichePage();
            break;

        // Dans la situation d'un repas ou repas Tenrac
        case 'repasTenrac':
        case 'repas':
        // On creer un controller pour afficher la page
            $repas = new RepasController();
            $repas::affichePage();
            break;

        // Dans le cas d'un plat
        case 'plat':
            // On creer un controller pour afficher la page
            $platpage = new PlatController();
            $platpage::affichePageTenrac();
            break;

        // Dans le cas de la page platTenrac ou recherche
        case 'recherche':
        case 'platTenrac':
            // On creer un controller pour afficher la page
            $platTenrac = new PlatController();
            $platTenrac::affichePage();
            break;

        // Dans une connexion
        case 'connexion':
            // On se connecte à la base de donné avec un controller ConnexionController puis avec une requete post de la méthode connecter du Controller
            $connexionPage = new ConnexionController();
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $connexionPage::connecter($_POST);
            }
            // On affiche la page
            $connexionPage::affichePage();
            break;

        // Dans le cas d'une déconnexion
        case 'deconnexion':
            // On se déconnecte via la méthode deconnecter
            $deconnexionPage = new ConnexionController();
            $deconnexionPage::deconnecter();
            // Puis on affiche une page d'acceuil
            $homePage = new HomePageController();
            $homePage::affichePage();
            break;

        // Dans le cas de motDePasseOublier
        case 'motDePasseOublier.php':
            // On crée un controller
            $motDePasseOubliePage = new MotDePasseOublierController();
            // On vérifie si il y a bien une méthode post du serveur
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Si c'est le cas on envoi un mail puis on affiche la page
            $motDePasseOubliePage::envoyerCourriel($_POST);
            }
            $motDePasseOubliePage::affichePage();
            break;

        case 'home':
            // On creer un controller pour afficher la page
            $homePage = new HomePageController();
            $homePage::affichePage();
            break;
        default:
            // Dans tous les autres cas on affiche une page erreur
            echo 'Erreur 404 - Page non trouvée';
            break;
    }
}
?>
