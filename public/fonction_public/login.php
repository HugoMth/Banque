<?php
    require_once '../../fonctions/bdd_lecteur.php';

    //  Récupération de l'utilisateur 
    $req = $bdd->prepare('SELECT * FROM account WHERE username = :username');
    $req->execute(array(
        'username' => filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS) ));
    $resultat = $req->fetch();

    //recuperation du mot de passe haché
    $ispasswordcorrect = password_verify($_POST['password'], $resultat['password']);
        
    //si il n'y a pas d'utilisateur correspondant alors redirection 
    if (!$resultat) {
        header ('Location: ../connexion.php?auth=failed');

    //si il y a un utilisateur alors check si  $ispasswordcorrect est correct et pas vide puis debut de la session
    } elseif(!empty($ispasswordcorrect)) {

        //puis on debute la session et on définit des $_SESSION par rapport au données recupérer dans la bdd et on redirige vers index.php
        session_start();
        $_SESSION['connected'] = 1;
        $_SESSION['id'] = $resultat['id_user'];
        $_SESSION['username'] = $resultat['username'];
        $_SESSION['prenom'] = $resultat['prenom'];
        $_SESSION['nom'] = $resultat['nom'];
        $_SESSION['question'] = $resultat['question'];
        $_SESSION['reponse'] = $resultat['reponse'];

        header('Location: ../index.php');

    //si le mot de passe n'est pas bon alors redirection connexion avec message d'erreur
    } else {
        
        header ('Location: ../connexion.php?auth=failed');
    }
?>
