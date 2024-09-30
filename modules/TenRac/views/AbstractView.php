<?php
namespace TenRac\views;

use TenRac\views\Header\HeaderView;


/**
 * Class AbstractView
 *
 * Cette classe abstraite définit la structure des vues dans l'application.
 * Elle exige que les classes qui l'étendent définissent certaines méthodes
 * pour gérer l'affichage de contenu HTML.
 */
abstract class AbstractView
{

    /**
     * Retourne la feuille de style CSS à utiliser pour la vue.
     *
     * @return string Le chemin vers la feuille de style CSS.
     */
    abstract function css(): string;

    /**
     * Retourne le titre de la page à afficher dans le header.
     *
     * @return string Le titre de la page.
     */
    abstract function pageTitle(): string;

    /**
     * Récupère et affiche le contenu du fichier header.html.
     *
     * @return void
     */
    private function header(): void
    {
        $loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
        $headerview = new HeaderView($this->pageTitle(), $this->css(),$loggedin);
        $headerview->afficher();
    }


    /**
     * Récupère et affiche le contenu du fichier footer.php.
     *
     * @return void
     */
    private function footer(): void
    {
        include __DIR__ . '/footer.php';
        footer_page();
    }

    /**
     * Méthode abstraite pour définir le corps de la vue.
     *
     * @return void
     */
    abstract protected function body();

    /**
     * Affiche la vue en appelant les méthodes header(), body() et footer().
     *
     * @return void
     */
    public function afficher(): void
    {
        $this->header();
        $this->body();
        $this->footer();
    }

}