<body>
<h1> Repas</h1>
<div class="div3" >
    <h2 class="titre2">
        Plats:
    </h2>
    <p>
        <img class="imgrdv" src="../../../img/Cavalier.png" height="300px" width="300px" alt="Cavalier">
            <span>
                <?php
                global $platBool,$dateExistsbool;
                if ($platBool && $dateExistsbool) {
                    echo $platBool;
                }
                else{
                    echo "Aucun plat pour ce moment !";
                }
                ?>
            </span>

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
            <span>lieu de présence: <?php
                global $LieuBool;
                if ($LieuBool && $dateExistsbool) {
                    echo $LieuBool;
                } else {
                    echo "Aucune rdv";
                }
                ?>



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
                    <span>Date de présence:    <?php

                        if ($dateExistsbool === true) {
                            echo date("Y/m/d");
                        } else {
                            echo "Aucune date";
                        }
                        ?></span>

            </p>
        </div>
    </div>

</section>
</body>

