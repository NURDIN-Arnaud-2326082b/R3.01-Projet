    <div class="slider">
        <img  class="slider-background" alt="Image de raclette" src="../../../img/wallpaperStructure.jpg" >
        <div class="slider-content">
            <h1>La structure des Tenracs</h1>
        </div>
    </div>

    <div id="gestionStructure">
        <form action="../controllers/StructureTenracController.php" method="POST">
            <h3>Ajouter un Club</h3>
            <input type="hidden" name="action" value="add">
            <p>Nom du Club : </p> <input type="text" name="nom"><br>
            <p>Adresse : </p> <input type="text" name="adr"><br>
            <p>Club Père : </p> <input type="text" name="pere"><br>
            <button type="submit">J'ajoute !</button>
        </form>

         <form action="../controllers/StructureTenracController.php" method="post">
            <h3>Modifier un Club</h3>
            <input type="hidden" name="action" value="update">
            <p>Identifiant du Club :</p><input type="text" name="idClub">
            <p>Nouveau nom :</p><input type="text" name="nom2">
            <p>Nouvelle adresse :</p><input type="text" name="adr2">
            <p>Nouveau club père :</p><input type="text" name="idPere">
            <button type="submit">P'tit coup de neuf !</button>
        </form>

        <form action="../controllers/StructureTenracController.php" method="POST">
            <h3>Supprimer un Club</h3>
            <input type="hidden" name="action" value="delete">
            <p>Identifiant du Club : </p> <input type="text" name="id"><br>
            <!--<p>Adresse : </p> <input type="text" name="adr2"><br>-->
            <button type="submit">Et ça dégage !</button>
        </form>
    </div>

    <div id="ordre_tenrac">
        <h2>L'Ordre</h2>
        <p id="sous_titre">Le royaume des Tenrac</p>
        <p>Description</p>
    </div>

    <div id ="autres_clubs">
        <h2>Autres clubs</h2>
        <div class="descri_club">
            <h3>NomClub</h3>
            <p>Adresse</p>
        </div>

        <div class="descri_club">
            <h3>Club</h3>
            <p>Adresse</p>
        </div>

        <div class="descri_club">
            <h3>Club</h3>
            <p>Adresse</p>
        </div>

        <div class="descri_club">
            <h3>Club</h3>
            <p>Adresse</p>
        </div>

    </div>