<?php
function header_page($page_title = "Titre par Défaut", $css_file = "style.css"): void
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
                <a class="header-logo" href="/modules/blog/views/homepage.php">
                    <img src="../../../img/logo_tenrac.png">
                </a>
                <ul class="header-menu">
                    <li><a href="/modules/blog/views/structure.php">Structure</a></li>
                    <li><a href="/modules/blog/views/repas.php">Repas</a></li>
                    <li><a href="/modules/blog/views/plat.php">Plat</a></li>
                    <li><a href="/modules/blog/views/connexion.php">Connexion</a></li>
                </ul>
            </div>
        </div>
    </header>
</body>
</html>
    <?php
}
?>
