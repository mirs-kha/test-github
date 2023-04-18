<?php
// on include la page connexion de la base de donnée
 include('connexion.php'); 

// Ecriture de la requête
$sqlQuery = 'INSERT INTO maTable(email, secteur, area, mdp) VALUES (:email, :secteur, :area, :mdp)';

// Préparation de la bdd
$insertForm = $db->prepare($sqlQuery);


 // Validation du formulaire
 if (isset($_POST['submit'])) {
    
    // Exécution ! Lesdonnées sont maintenant inserées dans base de données
    $insertForm->execute([
        'email' => $_GET['email'],
        'secteur' => $_GET['secteur'],
        'area' => $_GET['area'],
        'mdp' => $_GET['mdp'],

        // si vous voyez ce message c'est une réussite
        echo 'Les données dont bien inserées dans la base de données';
    ]);
        // sinon il y a une erreur
        } else {
            $errorMessage = sprintf("erreur lors de l'insertion");
        }
        $db = null;        // Deconnexion de la base de donnée
?>