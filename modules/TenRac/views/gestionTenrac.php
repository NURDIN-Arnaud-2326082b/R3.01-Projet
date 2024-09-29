<form action="/ajout-tenrac" method="POST">
    <label for="Courriel">Email : </label>
    <input type="email" name="Courriel" required><br>
    <label for="Code_personnel"> Password : </label>
    <input type="text" property="hash" name="Code_personnel" required><br>
    <label for="Nom">Nom : </label>
    <input type="text" name="Nom" required><br>
    <label for="Num_tel">Numéro : </label>
    <input type="text" name="Num_tel" required><br>
    <label for="Adresse"> Adresse : </label>
    <input type="text" name="Adresse" required><br>
    <label for="Grade"> Grade : </label>
    <input type="text" name="Grade" required><br>
    <label for="Rang">Rang : </label>
    <input type="text" name="Rang" required><br>
    <label for="Titre">Titre : </label>
    <input type="text" name="Titre" required><br>
    <label for="Dignite"> Dignite : </label>
    <input type="text" name="Dignite" required><br>
    <label for="Id_club"> Club : </label>
    <input type="number" name="Id_club" required><br>
    <button type="submit">Ajouter Tenrac</button>
</form>

<form action="/suppression-tenrac" method="POST">
    <input type="hidden" name="action" value="suppression">
    <label for="Courriel">Email : </label>
    <input type="email" name="Courriel" required><br>
    <button type="submit">Supprimer Tenrac</button>
</form>

<form action="/modifier-tenrac" method="POST">
    <label for="Courriel">Email : </label>
    <input type="email" name="Courriel" required><br>
    <label for="Code_personnel"> Mot de passe : </label>
    <input type="text" property="hash" name="Code_personnel"><br>
    <label for="Nom">Nom : </label>
    <input type="text" name="Nom"><br>
    <label for="Num_tel">Numéro tel : </label>
    <input type="text" name="Num_tel"><br>
    <label for="Adresse"> Adresse : </label>
    <input type="text" name="Adresse"><br>
    <label for="Grade"> Grade : </label>
    <input type="text" name="Grade"><br>
    <label for="Rang">Rang : </label>
    <input type="text" name="Rang"><br>
    <label for="Titre">Titre : </label>
    <input type="text" name="Titre"><br>
    <label for="Dignite"> Dignite : </label>
    <input type="text" name="Dignite"><br>
    <label for="Id_club"> Club : </label>
    <input type="number" name="Id_club"><br>
    <button type="submit">Modifier Tenrac</button>
</form>