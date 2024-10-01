<script>
    // Fonction JavaScript pour ajouter une nouvelle combobox
    function ajouterCombobox() {
        // Effectue une requête AJAX pour appeler la méthode PHP
        var xhr = new XMLHttpRequest();
        xhr.open('REQUEST_URI', '/ajouterIngredient', true); // Appelle la méthode recupIngredient du contrôleur via la route
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Crée un élément temporaire pour injecter la réponse (la combobox)
                var newCombobox = document.createElement('div');
                newCombobox.innerHTML = xhr.responseText; // Injecte la réponse HTML dans un div temporaire

                // Sélectionne le bouton "+" dans le formulaire
                var button = document.getElementById('ajouterbouton');

                // Insère la nouvelle combobox avant le bouton "+" dans le formulaire
                var form = document.getElementById('formulaire');
                form.insertBefore(newCombobox.firstElementChild, button);
            }
        };
        xhr.send();
    }
</script>
<button type="button" id="ajouterbouton" onclick="ajouterCombobox()">+</button>
<button type="submit">Ajouter</button>
</form>
</div>
</div>
</div>