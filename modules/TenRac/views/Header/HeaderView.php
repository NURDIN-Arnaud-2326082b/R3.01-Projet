<?php

namespace TenRac\views\Header;



class HeaderView
{
    public function __construct(
        private string $pageTitle,
        private string $css,
        private bool $loggedin
    )
    {
    }

    // permet de récupérer le contenu du fichier header.html
    function afficher(): void
    {

        $fd = fopen(__DIR__ . '/../Fragments/Header/header.html', 'r');
        $headerHtml = fread($fd, filesize(__DIR__ . '/../Fragments/Header/header.html'));

        $headerHtml = str_replace('{{pageTitle}}', $this->pageTitle, $headerHtml);
        $headerHtml = str_replace('{{css}}', $this->css, $headerHtml);


        $menuView = new MenuView($this->loggedin);
        $menu = $menuView->afficher();

        $headerHtml = str_replace('{{menu}}', $menu, $headerHtml);

        echo $headerHtml;
    }
}