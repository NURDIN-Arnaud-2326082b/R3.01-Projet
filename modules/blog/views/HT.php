<?php
function start_page($title):void
{
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/styles/Connexion.css">
    <link rel="icon" href="../../../img/logo_tenrac.jpg">


</head>
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
                <li><a href="plat.php">Plat</a></li>
                <li><a href="connexion.php">Connexion</a></li>
            </ul>
        </div>
    </div>
</header>

<?php
}
?>
<?php
function end_page($title):void
{
?><html>
<title>Connexion</title
<body>

<form method="post" action="connexion.php">
    <h1>Connexion</h1>
    Email: <input type="email" name="email" class="inpo" required ><br><br>
    mot de passe : <input type="password" name="motdepasse" class="inpo" required><br><br>
    <input type="submit" value="Envoyer" class="but">
</form>
</body>
</html>
    <?php
}
?>