<div id="overlay"></div>
<div class="slider">
    <img  class="slider-background" src="../../../img/tenders_raclette.webp" >
    <div class="slider-content">
        <h1>Tenrac</h1>
        <p>Voici nos plats à base de raclette</p>
    </div>
</div>


<div id="Plats" class="section dark">
    <div class="boxed text-center">
        <h2>Nos plats</h2>
        <div class="listeverticale" >
            <?php

            use TenRac\models\DbConnect;
            use TenRac\models\PlatModel;

            $platmodel = new PlatModel(new DbConnect());
            $plats = $platmodel->creerListe();
            foreach ($plats as $plat) {
                echo '<ul id="listeplat"><p>' . implode(", ", $plat) . "</p></ul>";
            }
            ?>
        </div>
    </div>
</div>

<div  id="Boissons" class=" section red">
    <div class="boxed text-center section red">
        <h2>Nos boissons</h2>
        <div class="flex space-between">
            <div class="coca Plats">
                <img src="../../../img/coca.png" class="coca">
                <h3>Coca-Cola</h3>
            </div>
            <div class="w25 wm100 Plats">
                <img src="../../../img/fanta.png" class="fanta">
                <h3>Fanta</h3>
        </div>
        <div class="w25 wm100 Plats">
            <img src="../../../img/sprite.png"  class="sprite">
            <h3>Sprite</h3>
        </div>
    </div>
    </div>
</div>