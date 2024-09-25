<?php

use TenRac\models\DbConnect;

$repas = new \TenRac\models\RepasModel(new DbConnect());
?>
<body>
<h1> Repas</h1>
<div class="div3" >
    <h2 class="titre2">
        présence d'un/d'une Cavalier/Dame:
    </h2>
    <p>
        <img class="imgrdv" src="../../../img/Cavalier.png" height="300px" width="300px" alt="Cavalier">
        <?php if ($repas->PresenceCouD() === True): ?>
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
            <?php if ($repas->PresenceCouD() === True && $repas->Verifdate()): ?>
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
                <?php if ($repas->getDate()): ?>
                    <span>Date de présence : <?php echo $date_base; ?></span>
                <?php else: ?>
                    <span>Date de présence : Aucune</span>
                <?php endif; ?>
            </p>
        </div>
    </div>

</section>
</body>

