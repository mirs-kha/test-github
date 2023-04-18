<?php
// on include la page connexion de la base de donnée
 include('connexion.php'); 

//  variable
$email = $_POST['email'];
$secteur = $_POST['secteur'];
$message = $_POST['message'];
$mdp = $_POST['mdp'];
$id = $_GET['id'];


// On verifie l'envoie du form
if (isset($_POST['submitmodif'])) {

    // Si Ok On modifie le contenu de la table maTable avec l'id récuperer de la page grace à GET
    $sqlQuery = 'UPDATE maTable  SET `email`= :email, `secteur`= :secteur, `message` = :area, `mdp` = :mdp WHERE id= :id';
    $statement = $db->prepare($sqlQuery);

    // securité des variables contre injection SQL grace aux arguments nommées de PDO (:variable)
    $statement->bindValue(":email", $email);
    $statement->bindValue(":secteur", $secteur);
    $statement->bindValue(":area", $message);
    $statement->bindValue(":mdp", $mdp);
    $statement->bindValue(":id", $id);
    $statement->execute();

        // si MAJ ok
        if ($statement->rowCount() > 0) {
            echo 'Mise à jour réussie';
        } 
        // sinon
        else {
            echo 'Aucune mise à jour effectuée';
        }

}

// sinon
else{
    echo "merci de valider";
}
$db = null;        // Deconnexion de la base de donnée
?>


 <!-- On affiche les informations de l'utilisateur via l'id de la page -->
 <?php
$sqlQuery = 'SELECT * FROM maTable  WHERE id= :id';
$maTableStatement = $db->prepare($sqlQuery);
$maTableStatement->execute();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <title>Modifier un membre</title>
</head>
<body>
    <!-- form -->
    <form action="modif.php" method="POST">
        <!-- mail -->
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="<?php echo strip_tags($_GET['email']); ?>">

        <!-- secteur -->
        <label for="secteur">Votre secteur d' activité : </label>
        <select name="secteur" id="secteur">
            <option value="Agricole">Agricole</option>
            <option value="Industrie">Industrie</option>
            <option value="Tertiaire">Tertiaire</option>
        </select>

        <!-- message -->
        <label for="message">Votre message</label>
        <textarea name="message"><?php echo strip_tags($_GET['message']); ?></textarea>

        <!-- mail -->
        <label for="mot de passe">Mot de passe</label>
        <input type="text" id="mdp" name="mdp" placeholder="<?php echo strip_tags($_GET['mdp']); ?>">

        <!-- btn -->
        <br><br><button type="submit" value="submitmodif" class="btn btn-primary mb-3">Validation</button>
    </form>


<!--                            on peut également ajouter un membre depuis la page Modification                           -->
    <br><p> <a href="form.html">Ajouter un nouveau membre</a></p>

<!--                                                 script bootstrap                                                       -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>


