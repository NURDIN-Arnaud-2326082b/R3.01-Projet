<?php
/*page_title = "Repas";
$css_files = "Repas.css";
require '../controllers/header.php';
header_page($page_title, $css_files);*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/styles/Repas.css">
    <link rel="icon" href="../../../img/logo_tenrac.jpg">
    <title><?php echo $page_title ?? "Repas"; ?></title>
</head>
<body>
<header>
    <div class="boxed">
        <div class="flex aligncenter space-between">
            <button onclick="openMenu()" class="header-menu-mobile">
                <span class="material-icons">menu</span>
            </button>
            <a class="header-logo" href="../../blog/views/homepage.php">
                <img src="../../../img/logo_tenrac.png">
            </a>
            <ul class="header-menu">
                <li><a href="../views/structure.php">Structure</a></li>
                <li><a href="../views/repas.php">Repas</a></li>
                <li><a href="../views/plat.php">Plat</a></li>
                <li><a href="../views/connexion.php">Connexion</a></li>
            </ul>
        </div>
    </div>
</header>
<h1> Repas</h1>
<div class="div3" >
    <h2 class="titre2">
        présence d'un/d'une Cavalier/Dame:
    </h2>
    <p>
        <img class="imgrdv" src="../../../img/Cavalier.png" height="300px" width="300px"  alt="Logo HubSpot">
        blablabla
        <img class="imgD" src="../../../img/Dame.png" height="250px" width="350px"  alt="Logo HubSpot">
    </p>
</div>
<section>
    <div class="divi">
        <h2 class="titre2">
            Lieu de rendez-vous :
        </h2>
        <p>
            <img class="imgrdv" src="../../../img/rdv.png" height="200px" width="200px"  alt="Logo HubSpot">
            blablabla
        </p>
    </div>
    <div class="divi">
        <h2 class="titre2">
            date :
        </h2>
        <div>
            <p>
                <img class="imgrdv" src="../../../img/date.png" height="200px" width="200px"  alt="Logo HubSpot">
                blablabla
            </p>
        </div>
    </div>

</section>

</body>
</html>

