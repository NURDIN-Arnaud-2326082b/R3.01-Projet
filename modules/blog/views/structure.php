<?php
$css_files = "Structure.css";
include __DIR__ . '/../controllers/header.php';
include __DIR__ . '/../controllers/footer.php';
header_page("Structure", $css_files);
?>

<div class="slider">
    <img  class="slider-background" alt="Image de raclette" src="../../../img/raclette.webp" >
    <div class="slider-content">
        <h1>La structure des Tenracs</h1>
        <p>Un vrai petit monde de passionnés</p>
    </div>
</div>

<div id="ordre_tenrac">
    <h2>L'Ordre</h2>
    <p class="sous_titre_club">Le royaume des Tenrac</p>
</div>

<div id ="Autres_clubs">
    <h2>Autres clubs</h2>
</div>

<?php
footer_page();
?>
