
<form action="/ajout-repas" class="ajout" method="POST">

    <label for="Dates"> Date du repas : </label>
    <input type="date" id="Dates" name="Dates" required><br>

    <label for="Gerant">Gérent du repas :</label>
    <input type="text" id="Gerant" name="Gerant" required><br>

    <label for="Id_Lieu">Lieu du repas avec id :</label>
    <input type="text" id="Id_Lieu" name="Id_Lieu" required><br>


    <button type="submit" class="ajoutRep">Ajouter Le Repas</button>
</form>