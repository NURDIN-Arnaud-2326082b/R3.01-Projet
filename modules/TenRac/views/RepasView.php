<?php
namespace TenRac\views;
use TenRac\controllers\RepasController;
use TenRac\models\DbConnect;
use TenRac\models\RepasModel;

/**
 * Class RepasView
 *
 * Représente la vue pour la page de repas.
 * Elle hérite de la classe abstraite AbstractView et définit les
 * méthodes nécessaires pour afficher le contenu spécifique à
 * la page de repas.
 */
class RepasView extends AbstractView
{


private bool $dateExists;
private string $idLieu;



    /**
     * Constructeur de la classe RepasView.
     *
     * @param bool $dateExists Indique si la date existe.
     * @param string $idLieu L'identifiant du lieu.
     * @param string $idPlat L'identifiant du plat.
     */
    public function __construct(bool $dateExists,string $idLieu,)
    {
        $this->dateExists=$dateExists;
        $this->idLieu=$idLieu;


    }


    /**
     * Définit le corps de la vue en incluant les fichiers
     * de contenu relatifs à la page de repas.
     *
     * Si l'utilisateur est connecté, il inclut également
     * le fichier 'repasTenrac.php'.
     *
     * @return void
     */
    protected function body(): void
    {
        global $dateExistsbool,$LieuBool;
        $dateExistsbool=$this->dateExists;
        $LieuBool=$this->idLieu;

        include __DIR__ . '/repas.php';
        $loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
        if ($loggedin){
            include __DIR__ . '/repasTenrac.php';
        }
    }

    /**
     * Retourne la feuille de style CSS à utiliser pour la page de repas.
     *
     * @return string Le chemin vers la feuille de style CSS.
     */
    function css(): string
    {
        return 'Repas.css';
    }

    /**
     * Retourne le titre de la page de repas.
     *
     * @return string Le titre de la page.
     */
    function pageTitle(): string
    {
        return 'Nos Repas';
    }
}