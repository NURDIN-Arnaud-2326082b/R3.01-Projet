</div>

<div id="fonctionAjouter">
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
</div>
