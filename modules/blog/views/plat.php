<?php
$page_title = "Plat";
$css_files = "Plat.css";
require '../controllers/header.php';
header_page($page_title, $css_files);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <link rel="icon" href="../../../img/logo_tenrac.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenrac</title>
</head>
<body>
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

<div id="Plats" class="section dark">
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

<div  id="Boissons" class=" section red">
    <div class="boxed text-center section red">
        <h2>Nos boissons</h2>
        <div class="flex space-between">
            <div class="w25  wm100 Plats">
                <img src="../../../img/coca.jpg">
                <h3>Coca-Cola</h3>
            </div>
            <div class="w25 wm100 Plats">
                <img src="../../../img/fanta.jpg">
                <h3>Fanta</h3>
        </div>
        <div class="w25 wm100 Plats">
            <img src="../../../img/oasis.jpg">
            <h3>Oasis</h3>
        </div>
    </div>
</div>
</body>
</html>



