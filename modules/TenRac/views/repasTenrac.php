<form action="/ajout-repas" class = "ajout" method="POST">

    <label for="Dates"> Date du repas : </label>
    <input type="date" id="Dates" name="Dates" required><br>

    <label for="Gerant">Gérent du repas :</label>
    <input type="text" id="Gerant" name="Gerant" required><br>

    <label for="Adresse">Lieu du repas avec id :</label>
    <input type="text" id="Adresse" name="Adresse" required><br>

    <label for="Plat">Plat du repas :</label>
    <input type="text" id="Plat" name="Plat" required><br>


    <button type="submit" class="ajoutRep">Ajouter Le Repas</button>
</form>