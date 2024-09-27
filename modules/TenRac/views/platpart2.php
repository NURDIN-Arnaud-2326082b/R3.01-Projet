</div>
</div>
</div>

<div  id="Boissons" class=" section red">
    <div class="boxed text-center section red">
        <div >
            <form action="/add-plat" method="POST">
                <h3>Ajouter un Plat</h3>
                <input type="hidden" name="action" value="add">
                <p>Nom du Plat : </p> <input type="text" name="nom" required><br>
                <p>Ingrédient : </p><br>
                <select name="action" id="ingredient" name="ingr" required>
                    <option value="">Sélectionnez un ingrédient</option>
