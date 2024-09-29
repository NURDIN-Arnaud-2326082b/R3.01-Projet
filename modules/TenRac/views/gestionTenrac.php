<form action="/ajout-tenrac" method="POST">
    <label for="courriel">Email :</label>
    <input type="email" id="courriel" name="Courriel" required><br>



    <label for="Code_personnel"> Password : </label>
    <input type="text" property="hash" id="Code_personnel" name="Code_personnel" required><br>

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="Nom" required><br>

    <label for="num_tel">Numéro :</label>
    <input type="text" id="num_tel" name="Num_tel" required><br>

    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="Adresse" required><br>

    <label for="grade">Grade :</label>
    <input type="text" id="grade" name="Grade" required><br>

    <label for="rang">Rang :</label>
    <input type="text" id="rang" name="Rang" required><br>

    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="Titre" required><br>

    <label for="dignite">Dignite :</label>
    <input type="text" id="dignite" name="Dignite" required><br>

    <label for="id_club">Club :</label>
    <input type="number" id="id_club" name="Id_club" required><br>

    <button type="submit">Ajouter Tenrac</button>
</form>

<form action="/suppression-tenrac" method="POST">
    <input type="hidden" name="action" value="suppression">
    <label for="Courriel">Email : </label>
    <input type="email" id="Courriel" name="Courriel" required><br>
    <button type="submit">Supprimer Tenrac</button>
</form>

<form action="/modifier-tenrac" method="POST">
    <label for="Courriel_1">Email : </label>
    <input type="email" id="Courriel_1" name="Courriel" required><br>

    <label for="Code_personnel_1"> Mot de passe : </label>
    <input type="text" id="Code_personnel_1" property="hash" name="Code_personnel"><br>

    <label for="nom_1">Nom : </label>
    <input type="text" id="nom_1" name="Nom"><br>

    <label for="num_tel_1">Numéro tel : </label>
    <input type="text" id="num_tel_1" name="Num_tel"><br>

    <label for="adresse_1">Adresse : </label>
    <input type="text" id="adresse_1" name="Adresse"><br>

    <label for="grade_1">Grade : </label>
    <input type="text" id="grade_1" name="Grade"><br>

    <label for="rang_1">Rang : </label>
    <input type="text" id="rang_1" name="Rang"><br>

    <label for="titre_1">Titre : </label>
    <input type="text" id="titre_1" name="Titre"><br>

    <label for="dignite_1">Dignite : </label>
    <input type="text" id="dignite_1" name="Dignite"><br>

    <label for="id_club_1">Club : </label>
    <input type="number" id="id_club_1" name="Id_club"><br>

    <button type="submit">Modifier Tenrac</button>
</form>