<?php
session_start();
function header_page($page_title = "Titre par Défaut", $css_file = ""): void
{
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/styles/<?php echo $css_file; ?>">
    <link rel="icon" href="../../../img/logo_tenrac.jpg">
    <title><?php echo $page_title; ?></title>
</head>
<body>
    <header>
        <div class="boxed">
            <div class="flex aligncenter space-between">
                <button onclick="openMenu()" class="header-menu-mobile">
                    <span class="material-icons">menu</span>
                </button>
                <a class="header-logo" href="/modules/TenRac/views/homepage.php">
                    <img src="../../../img/logo_tenrac.png" alt="logo_tenrac">
                </a>
                <ul class="header-menu">
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <li><a href="/modules/TenRac/views/structureTenrac.php">Structure</a></li>
                    <?php else: ?>
                        <li><a href="/modules/TenRac/views/structure.php">Structure</a></li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <li><a href="/modules/TenRac/views/repasTenrac.php">Repas</a></li>
                    <?php else: ?>
                        <li><a href="/modules/TenRac/views/repas.php">Repas</a></li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <li><a href="/modules/TenRac/views/plattenrac.php">Plat</a></li>
                    <?php else: ?>
                        <li><a href="/modules/TenRac/views/plat.php">Plat</a></li>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <li><a href="/modules/TenRac/views/gestionTenrac.php">Tenrac</a></li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <li><a href="/modules/TenRac/views/deconnexion.php">Se déconnecter</a></li>
                    <?php else: ?>
                        <li><a href="/modules/TenRac/views/connexion.php">Se connecter</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </header>
    <?php
}
?>
