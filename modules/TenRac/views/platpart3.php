<script>
    // Fonction JavaScript pour ajouter une nouvelle combobox
    function ajouterCombobox() {
        // Crée un élément div pour la nouvelle combobox
        var newDiv = document.createElement('div');

        // Effectue une requête AJAX pour appeler la méthode PHP
        var xhr = new XMLHttpRequest();
        xhr.open('REQUEST_URI', '/ajouterIngredient', true); // Appelle la méthode recupIngredient du contrôleur via la route
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Injecte la réponse (le <select> généré par PHP) dans le div
                newDiv.innerHTML = xhr.responseText;
                var button = document.getElementById('boutonajouter');
                var container = document.getElementById('addcombo');
                container.insertBefore(newDiv, button);
            }
        };
        xhr.send();
    }
</script>
<button type="button"  id="boutonajouter" onclick="ajouterCombobox()">+</button>
<button type="submit">Ajouter</button>
</form>
</div>
</div>
</div>