<body>
<h1> Repas</h1>
<div class="div3" >
    <h2 class="titre2">
        Plats:
    </h2>
    <p>
    <img class="imgrdv" src="../../../img/assiette.png" height="300px" width="300px" alt="assiette_logo">
            <span>
                <?php
                global $platBool,$dateExistsbool,$affichagePlat;
                if ($affichagePlat !== null) {
                    echo $affichagePlat;
                }
                else{
                    echo "Aucun plat pour ce moment !";
                }
                ?>
            </span>

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
                    echo "Aucun rdv";
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

