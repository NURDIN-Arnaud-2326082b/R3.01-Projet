<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="icon" href="img/logo_tenrac.png">
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
            <a class="header-logo" href="#">
                <img src="img/logo_tenrac.png">
            </a>
            <ul class="header-menu">
                <li><a href="modules/blog/views/structure.php">Structure</a></li>
                <li><a href="modules/blog/views/repas.php">Repas</a></li>
                <li><a href="modules/blog/views/plat.php">Plat</a></li>
                <li><a href="modules/blog/views/authentification.php">Authentification</a></li>
            </ul>
        </div>
    </div>
</header>

<div class="slider">
    <img  class="slider-background" src="img/slider.jpg" >
    <div class="slider-content">
        <h1>Tenrac</h1>
        <p>blablabla</p>
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
        <h2>blablabla</h2>
        <div class="flex toColumn gap20">
            <div class="w25 wm100 skill">
                <img src="img/html.png">
                <h3>poulet</h3>
            </div>
            <div class="w25 wm100 skill">
                <img src="img/css.png">
                <h3>tenders</h3>
            </div>
            <div class="w25 wm100 skill">
                <img src="img/c++.png">
                <h3>bouffe</h3>
            </div>
            <div class="w25 wm100 skill">
                <img src="img/java.png">
                <h3>d'autre bouffe</h3>
            </div>
        </div>
    </div>
</div>

<div  id="contact" class="section_dark">
    <div class="boxed text-center">
        <h2>blablabla</h2>
        <div class="flex space-between">
            <div class="w32  wm100 realisation">
                <img src="img/chess.jpg">
                <h3>blablabla</h3>
            </div>
        </div>
    </div>
</div>

<div  id="contact" class="section dark">
    <div class="boxed">
        <h2>Me contacter</h2>
        <form id="contact-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="nom" required placeholder="Entrer votre nom">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Entrer votre email">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required placeholder="Entrer votre message"></textarea>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>
</body>
</html>
