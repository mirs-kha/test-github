<?php
// on include la page connexion de la base de donnée
 include('connexion.php'); 


// On récupère tout le contenu de la table maTable
$sqlQuery = 'SELECT * FROM maTable';
$maTableStatement = $db->prepare($sqlQuery);
$maTableStatement->execute();
$donnees = $maTableStatement->fetchAll();

// On affiche chaque membre un à un à l'aide d'une boucle foreach qui va rechercher tout les infos de l' array associatif (fetchAll)
foreach ($donnees as $donnee) {
?>


<!--                                                 partie html de la boucle                                          -->
    <p><?php echo strip_tags($donnee['email']); ?></p>
    <p><?php echo strip_tags($donnee['secteur']); ?></p>
    <p><?php echo strip_tags($donnee['area']); ?></p>
    <p><?php echo strip_tags($donnee['mdp']); ?></p>
    <br><a href="modif.php?id=<?php echo strip_tags($donnee['id']); ?>" class="btn btn-primary mb-3">Modifier</a> 
    <br><a href="supp.php?id=<?php echo strip_tags($donnee['id']); ?>" class="btn btn-primary mb-3">Supprimer</button>
    <br><br><br>
<?php
// fin de la boucle grace à l' accolade
}

$db = null;        // Deconnexion de la base de donnée
?>

<!--                            on peut également ajouter un membre depuis la page Affichage                            -->
<br><p> <a href="form.html">Ajouter un nouveau membre</a></p>









