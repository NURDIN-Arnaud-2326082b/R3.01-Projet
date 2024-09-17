<?php
function footer_page($css_file = "style.css"): void
{
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/styles/<?php echo $css_file; ?>">
    </head>
    <body>
    <div id = "footer">
        <div id="links">
            <ul id="footer-menu">
                <li><a href="/modules/blog/views/structure.php">Structure</a></li>
                <li><a href="/modules/blog/views/repas.php">Repas</a></li>
                <li><a href="/modules/blog/views/plat.php">Plat</a></li>
                <li><a href="/modules/blog/views/connexion.php">Connexion</a></li>
            </ul>
        </div>
        <div id="credits">
            <p>© Tenrac <br></p>
            <p>Site réalisé par les élèves de deuxième année du BUT Informatique de Aix-en-Provence</p>
        </div>
    </div>
    </body>
    </html>
    <?php
}
?>
