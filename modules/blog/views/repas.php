<?php
session_start();
$page_title = "Repas";
$css_files = "Repas.css";
require '../controllers/header.php';
include __DIR__ . '/../controllers/footer.php';

header_page($page_title, $css_files);

$cavalier_present = false;  // Vous pouvez ajuster cette condition selon vos besoins
$dame_presente = false;     // Vous pouvez ajuster cette condition selon vos besoins

// Obtenir la date actuelle
$date_rencontre = date("d-m-Y H:i:s");
$lieu_renconte="Salle de conférence, Hôtel XYZ";
?>

<h1> Repas</h1>
<div class="div3" >
    <h2 class="titre2">
        présence d'un/d'une Cavalier/Dame:
    </h2>
    <p>
        <img class="imgrdv" src="../../../img/Cavalier.png" height="300px" width="300px" alt="Cavalier">
        <?php if ($cavalier_present ): ?>
            <span>Cavalier présent</span>
        <?php else: ?>
            <span>Aucun cavalier présent</span>
        <?php endif; ?>
        <img class="imgD" src="../../../img/Dame.png" height="250px" width="350px" alt="Dame">
        <?php if ($dame_presente): ?>

            <span>Dame présente</span>
        <?php else: ?>
            <span>Aucune dame présente</span>
        <?php endif; ?>
    </p>
</div>
<section>
    <div class="divi">
        <h2 class="titre2">
            Lieu de rendez-vous :
        </h2>
        <p>
            <img class="imgrdv" src="../../../img/rdv.png" height="200px" width="200px"  alt="Logo HubSpot">
            <?php if ($cavalier_present || $dame_presente): ?>
                <span>lieu de présence : <?php echo $lieu_renconte; ?></span>
            <?php endif; ?>
        </p>
    </div>
    <div class="divi">
        <h2 class="titre2">
            date :
        </h2>
        <div>
            <p>
                <img class="imgrdv" src="../../../img/date.png" height="200px" width="200px"  alt="Logo HubSpot">
                <?php if ($cavalier_present || $dame_presente): ?>

                    <span>Date de présence : <?php echo $date_rencontre; ?></span>
                <?php endif; ?>


            </p>
        </div>
    </div>

</section>
<?php
footer_page();
?>

