<script>
    function ajouterCombobox() {
        // Crée un élément <select>
        var select = document.createElement('select');

        // Ajoute des options à la combobox
        var option1 = document.createElement('option');
        option1.value = "valeur1";
        option1.text = "Option 1";
        select.appendChild(option1);

        var option2 = document.createElement('option');
        option2.value = "valeur2";
        option2.text = "Option 2";
        select.appendChild(option2);

        // Ajoute la combobox au div qui contient toutes les combobox
        document.getElementById('combobox-container').appendChild(select);
    }
</script>
<button type="button" onclick="ajouterCombobox()">+</button>
<button type="submit">Ajouter</button>
</form>
</div>
</div>
</div>