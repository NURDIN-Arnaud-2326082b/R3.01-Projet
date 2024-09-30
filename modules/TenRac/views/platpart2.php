</div>
</div>
</div>

<div  id="Boissons" class=" section red">
    <div class="boxed text-center section red">
        <div id ="addcombo">
            <form action="/add-plat" method="POST">
                <h3>Ajouter un Plat</h3>
                <input type="hidden" name="action" value="add">
                <label> <p>Nom du Plat : </p>
                    <input type="text" name="nom" required>
                </label><br>
                <label for="ingredient"> <p>Ingrédient :</p></label>