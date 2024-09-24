<?php

namespace TenRac\views;

abstract class AbstractView
{
    abstract function css(): string;
    abstract function pageTitle(): string;

    private function header()
    {
        include __DIR__ . '/header.php';
        header_page($this->pageTitle(), $this->css());

    }

    private function footer()
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