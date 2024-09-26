<body>
<h1> Repas</h1>
<div class="div3" >
    <h2 class="titre2">
        présence d'un/d'une Chevalier/Dame:
    </h2>
    <p>
        <img class="imgrdv" src="../../../img/Cavalier.png" height="300px" width="300px" alt="Cavalier">
            <span>Chevalier présent / Dame présente</span>
            <span>Aucun chevalier ou dame présent(e)</span>
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
            <span>lieu de présence :<?php
                global $adresseMessage
                ?>
                    <?php echo $adresseMessage; ?>
                    </span>

        </p>
    </div>
    <div class="divi">
        <h2 class="titre2">
            date :
        </h2>
        <div>
            <p>
                <img class="imgrdv" src="../../../img/date.png" height="200px" width="200px"  alt="Logo HubSpot">
                    <span>Date de présence : <?php
                            global $dateExists;
                        if ($dateExists === true) {
                            echo "Aucune date d'aujourd'hui dans la base de données.";
                        } else {
                            echo date("Y/m/d");
                        }
                        ?></span>

            </p>
        </div>
    </div>

</section>
</body>

