<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../assets/styles/StylePlat.css">
    <link rel="icon" href="../../../img/logo_tenrac.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenrac</title>
</head>
<body>
<header>
    <div class="boxed">
        <div class="flex  aligncenter space-between">
            <button  onclick="openMenu()" class="header-menu-mobile">
                <span class="material-icons">menu</span>
            </button>
            <a class="header-logo" href="../../../index.php">
                <img src="../../../img/logo_tenrac.png">
            </a>
            <ul class="header-menu">
                <li><a href="../../../structure.php">Structure</a></li>
                <li><a href="repas.php">Repas</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </div>
    </div>
</header>
<div id="overlay"></div>



<div class="slider">
    <img  class="slider-background" src="../../../img/raclette.jpg" >
    <div class="slider-content">
        <h1>Tenrac</h1>
        <p>Voici nos plats à base de raclette</p>
    </div>
</div>

<div  id="about" class="section">
    <div class="boxed">
        <div class="flex toColumn mCenter">
            <div  class="w40 wm100">
                <h2>blablabla</h2>

            </div>
            <div class="w60 wm100">
                <p>blablabla</p>
            </div>
        </div>
    </div>
</div>

<div id="skills" class="section dark">
    <div class="boxed text-center">
        <h2>Nos plats</h2>
        <div class="flex toColumn gap20">
            <div class="w25 wm100 Plats">
                <img src="../../../img/Tenders.png">
                <h3>Tenders</h3>
            </div>
            <div class="w25 wm100 Plats">
                <img src="../../../img/Chips.png">
                <h3>Chips</h3>
            </div>
            <div class="w25 wm100 Plats">
                <img src="../../../img/Hamburger.png">
                <h3>Hamburgers</h3>
            </div>
            <div class="w25 wm100 Plats">
                <img src="../../../img/Tacos.png">
                <h3>Tacos</h3>
            </div>
        </div>
    </div>
</div>

<div  id="Boissons" class="boissons">
    <div class="boxed text-center">
        <h2>Nos boissons</h2>
        <div class="flex space-between">
            <div class="w25  wm100 boissons">
                <img src="../../../img/chess.jpg">
                <h3>blablabla</h3>
            </div>
        </div>
    </div>
</div>
</body>
</html>
