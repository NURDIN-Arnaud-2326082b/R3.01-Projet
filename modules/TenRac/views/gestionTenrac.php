<form action="/ajout-tenrac" method="POST">
    <label for="Courriel">Email : </label>
    <input type="email" name="Courriel" required><br>
    <label for="Code_personnel"> Mot de passe : </label>
    <input type="text" property="hash" name="Code_personnel" required><br>
    <label for="Nom">Nom : </label>
    <input type="text" name="Nom" required><br>
    <label for="Num_tel">Numéro tel : </label>
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








<!--<form action="" method="POST">-->
<!--    <input type="hidden" name="action" value="modification">-->
<!--    <input type="hidden" name="id" value="--><?php //echo $tenrac['id']; ?><!--">-->
<!---->
<!--    <label for="Courriel">Email : </label>-->
<!--    <input type="email" name="Courriel" value="--><?php //echo $tenrac['Courriel']; ?><!--"><br>-->
<!---->
<!--    <label for="Code_personnel">Mot de passe (Laisser vide si inchangé) : </label>-->
<!--    <input type="password" name="Code_personnel" placeholder="Nouveau mot de passe"><br>-->
<!---->
<!--    <label for="Nom">Nom : </label>-->
<!--    <input type="text" name="Nom" value="--><?php //echo $tenrac['Nom']; ?><!--" required><br>-->
<!---->
<!--    <label for="Num_tel">Numéro de téléphone : </label>-->
<!--    <input type="text" name="Num_tel" value="--><?php //echo $tenrac['Num_tel']; ?><!--" required><br>-->
<!---->
<!--    <label for="Adresse">Adresse : </label>-->
<!--    <input type="text" name="Adresse" value="--><?php //echo $tenrac['Adresse']; ?><!--" required><br>-->
<!---->
<!--    <label for="Grade">Grade : </label>-->
<!--    <input type="text" name="Grade" value="--><?php //echo $tenrac['Grade']; ?><!--" required><br>-->
<!---->
<!--    <label for="Rang">Rang : </label>-->
<!--    <input type="text" name="Rang" value="--><?php //echo $tenrac['Rang']; ?><!--" required><br>-->
<!---->
<!--    <label for="Titre">Titre : </label>-->
<!--    <input type="text" name="Titre" value="--><?php //echo $tenrac['Titre']; ?><!--" required><br>-->
<!---->
<!--    <label for="Dignite">Dignité : </label>-->
<!--    <input type="text" name="Dignite" value="--><?php //echo $tenrac['Dignite']; ?><!--" required><br>-->
<!---->
<!--    <label for="Id_club">Club : </label>-->
<!--    <input type="number" name="Id_club" value="--><?php //echo $tenrac['Id_club']; ?><!--" required><br>-->
<!---->
<!--    <button type="submit">Modifier Tenrac</button>-->
<!--</form>-->
<?php
//if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'modification') {
//    $id = $_POST['id'];
//
//    $newTenrac = [
//        'Courriel' => $_POST['Courriel'],
//        'Nom' => $_POST['Nom'],
//        'Num_tel' => $_POST['Num_tel'],
//        'Adresse' => $_POST['Adresse'],
//        'Grade' => $_POST['Grade'],
//        'Rang' => $_POST['Rang'],
//        'Titre' => $_POST['Titre'],
//        'Dignite' => $_POST['Dignite'],
//        'Id_club' => $_POST['Id_club']
//    ];
//
//    if (!empty($_POST['Code_personnel'])) {
//        $newTenrac['Code_personnel'] = password_hash($_POST['Code_personnel'], PASSWORD_DEFAULT);
//    }
//
//    // Appel à la fonction de modification
//    $userController->modifierTenrac($id, $newTenrac);
//}
//
//if (isset($_GET['courriel'])) {
//    $courriel = $_GET['courriel'];
//
//    $stmt = $conn->prepare("SELECT * FROM Tenrac WHERE Courriel = ?");
//    $stmt->bind_param("s", $courriel);
//    $stmt->execute();
//    $result = $stmt->get_result();
//
//    if ($result->num_rows > 0) {
//        $tenrac = $result->fetch_assoc();
//    } else {
//        echo "Aucun Tenrac trouvé avec cet email.";
//    }
//
//    $stmt->close();
//}
//
//footer_page();
//?>

