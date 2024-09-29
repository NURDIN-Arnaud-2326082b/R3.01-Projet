</div>

<div id="gestionStructure">
    <form action="/add-structure" method="POST">
        <h3>Ajouter un Club</h3>
        <input type="hidden" name="action" value="add">
         <label> <p>Nom du Club : </p>
            <input type="text" name="nom" required>
        </label><br>


        <label>  <p>Adresse : </p>
            <input type="text" name="adr" required>
        </label><br>


        <button type="submit">J'ajoute !</button>
    </form>

    <form action="/update-structure" method="POST">
        <h3>Modifier un Club</h3>
        <input type="hidden" name="action" value="update">
        <label> <p>Id du club :</p>
            <input type="text" name="id" required>
        </label><br>
        <label> <p>Nouveau nom :</p>
            <input type="text" name="nomClub">
        </label><br>
        <label> <p>Nouvelle adresse :</p>
            <input type="text" name="adr">
        </label><br>
        <button type="submit">P'tit coup de neuf !</button>
    </form>

    <form action="/delete-structure" method="POST">
        <h3>Supprimer un Club</h3>
        <input type="hidden" name="action" value="delete">
        <label> <p>Identifiant du Club : </p>
            <input type="text" name="id" required>
        </label><br>
        <button type="submit">Et ça dégage !</button>
    </form>
</div>
