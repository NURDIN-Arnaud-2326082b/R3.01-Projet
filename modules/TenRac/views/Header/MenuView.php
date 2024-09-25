<?php

namespace TenRac\views\Header;

class MenuView
{

    public function __construct(private bool $loggedin)
    {
    }

    public function afficher(): string
    {
       if($this->loggedin === true) {
           return $this->menuLogged();
       }
       else {
           return $this->menu();
       }
    }

    private function menuLogged(): string
    {
        $fd = fopen(__DIR__ . '/../Fragments/Header/menu-logged.html', 'r');
        $headerHtml = fread($fd, filesize(__DIR__ . '/../Fragments/Header/menu-logged.html'));

        return $headerHtml;
    }

    private function menu(): string
    {
        $fd = fopen(__DIR__ . '/../Fragments/Header/menu.html', 'r');
        $headerHtml = fread($fd, filesize(__DIR__ . '/../Fragments/Header/menu.html'));

        return $headerHtml;
    }
}