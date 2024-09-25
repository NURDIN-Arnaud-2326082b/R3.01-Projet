<?php

namespace TenRac\views;

use TenRac\views\Header\HeaderView;

abstract class AbstractView
{
    abstract function css(): string;
    abstract function pageTitle(): string;

    // permet de récupérer le contenu du fichier header.html
    private function header(): void
    {
        $headerview = new HeaderView($this->pageTitle(), $this->css(),true);
        $headerview->afficher();
    }

    private function footer(): void
    {
        include __DIR__ . '/footer.php';
        footer_page();
    }

    abstract protected function body();

    public function afficher(): void
    {
        $this->header();
        $this->body();
        $this->footer();
    }
}