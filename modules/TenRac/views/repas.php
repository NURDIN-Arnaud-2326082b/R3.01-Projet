<?php
$page_title = "Repas";
$css_files = "Repas.css";

global $userController, $conn;
require_once __DIR__ . '/../controllers/header.php';
require_once __DIR__ . '/../controllers/footer.php';
require_once '../models/db_connect.php';
require_once '../controllers/TenracController.php';
require_once '../models/RepasModel.php';
require_once '../controllers/RepasController.php';
header_page($page_title, $css_files);

$model = new RepasModel($conn);
$date_base = $model->getDate(1);
$Lieu_rencontre = $model->getLieu(1);
$presenceCouD = $model->PresenceCouD();


$controller = new RepasController();
$dateCorrespond = $controller->Verifdate($date_base);
?>
<body>
<h1> Repas</h1>
<div class="div3" >
    <h2 class="titre2">
        présence d'un/d'une Cavalier/Dame:
    </h2>
    <p>
        <img class="imgrdv" src="../../../img/Cavalier.png" height="300px" width="300px" alt="Cavalier">
        <?php if ($presenceCouD === True): ?>
            <span>Cavalier présent / Dame présente</span>
        <?php else: ?>
            <span>Aucun cavalier ou dame présent(e)</span>
        <?php endif; ?>
        <img class="imgD" src="../../../img/Dame.png" height="250px" width="350px" alt="Dame">
    </p>
</div>
<section>
    <div class="divi">
        <h2 class="titre2">
            Lieu de rendez-vous :
        </h2>
        <p>
            <img class="imgrdv" src="../../../img/rdv.png" height="200px" width="200px"  alt="Logo HubSpot">
            <?php if ($presenceCouD === True): ?>
                <span>lieu de présence : <?php echo  $Lieu_rencontre; ?></span>
            <?php else: ?>
                <span>lieu de présence : Aucun</span>
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
                <?php if ($dateCorrespond): ?>
                    <span>Date de présence : <?php echo $date_base; ?></span>
                <?php else: ?>
                    <span>Date de présence : Aucune</span>
                <?php endif; ?>
            </p>
        </div>
    </div>

</section>
</body>

