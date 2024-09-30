<script>
    // Fonction JavaScript pour ajouter une nouvelle combobox
    function ajouterCombobox() {
        // Crée un élément <select>
        var select = document.createElement('select');

        // Appelle la fonction PHP via une requête AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'index.php?action=rajouter-ingrédient', true); // Appelle le fichier PHP qui génère les <option>
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Ajoute la réponse (les <option>) au select
                select.innerHTML = xhr.responseText;
            }
        };
        xhr.send();

        // Ajoute la nouvelle combobox au div
        document.getElementById('addcombo').appendChild(select);
    }
</script>
<button type="button" onclick="ajouterCombobox()">+</button>
<button type="submit">Ajouter</button>
</form>
</div>
</div>
</div>