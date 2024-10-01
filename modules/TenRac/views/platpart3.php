<style>
    /* Style pour le modal (popup) */
    .modal {
        display: none; /* Masqué par défaut */
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Fond sombre */
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        width: 400px;
        text-align: center;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

</style>
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

    // Récupérer le modal
    var modal = document.getElementById("monModal");

    // Récupérer le bouton qui ouvre le modal
    var btn = document.getElementById("modifierBtn");

    // Récupérer l'élément <span> qui ferme le modal
    var span = document.getElementsByClassName("close")[0];

    // Quand l'utilisateur clique sur le bouton, le modal s'ouvre
    btn.onclick = function() {
        modal.style.display = "flex"; // Utilisation de flexbox pour centrer le modal
    }

    // Quand l'utilisateur clique sur <span> (x), fermer le modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Quand l'utilisateur clique en dehors du modal, le fermer
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }

    // Fonction pour modifier le plat et les ingrédients
    function modifierPlat() {
        // Récupérer le nom du plat
        var nomPlat = document.getElementById('platName').value;

        // Récupérer les ingrédients sélectionnés
        var ingredientsSelect = document.getElementById('ingredientSelect');
        var selectedIngredients = Array.from(ingredientsSelect.selectedOptions).map(option => option.value);

        // Mettre à jour le contenu du tableau
        var cellulePlat = document.getElementById('platCell');
        var celluleIngr = document.getElementById('ingCell');

        if (cellulePlat && celluleIngr) {
            // Modifier la cellule du plat
            cellulePlat.innerHTML = nomPlat;

            // Modifier la cellule des ingrédients (en les séparant par des virgules)
            celluleIngr.innerHTML = selectedIngredients.join(', ');
        }

        // Fermer le modal après la modification
        modal.style.display = "none";
    }
    }

</script>
<button type="button" id="ajouterbouton" onclick="ajouterCombobox()">+</button>
<button type="submit">Ajouter</button>
</form>
</div>
</div>
</div>