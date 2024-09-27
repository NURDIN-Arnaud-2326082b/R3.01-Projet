</div>

<div id="gestionStructure">
    <form action="/add-structure" method="POST">
        <h3>Ajouter un Club</h3>
        <input type="hidden" name="action" value="add">
        <p>Nom du Club : </p> <input type="text" name="nom" required><br>
        <p>Adresse : </p> <input type="text" name="adr" required><br>
        <p>Club Père : </p> <input type="text" name="pere" required><br>
        <button type="submit">J'ajoute !</button>
    </form>

    <form action="/update-structure" method="POST">
        <h3>Modifier un Club</h3>
        <input type="hidden" name="action" value="update">
        <p>Nom actuel :</p><input type="text" name="nom">
        <p>Nouveau nom :</p><input type="text" name="nom2">
        <p>Nouvelle adresse :</p><input type="text" name="adr">
        <p>Nouveau club père :</p><input type="text" name="nomPere">
        <button type="submit">P'tit coup de neuf !</button>
    </form>

    <form action="/delete-structure" method="POST">
        <h3>Supprimer un Club</h3>
        <input type="hidden" name="action" value="delete">
        <p>Identifiant du Club : </p> <input type="text" name="id"><br>
        <button type="submit">Et ça dégage !</button>
    </form>
</div>
