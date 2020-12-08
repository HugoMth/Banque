<?php
require_once '../../fonctions/bdd_lecteur.php';

// on verifie qu'il y a bien un username correspondant dans la bdd et on redirige vers une page où est posé la question secrete
$req = $bdd->prepare('SELECT * FROM account WHERE username = :username');
$req->execute(array(
    'username' => $_POST['username']));
$resultat = $req->fetch();

if (!$resultat) {
    header ('Location: ../recuperation_1.php?user=nomatch');
}
// on définit les paramettres de sessions correspondant à l'username mais on ne définit pas le paramettre 'connected' pour que l'utilisateur n'ai pas accès au reste du site
else {
    session_start();
    $_SESSION['id'] = $resultat['id_user'];
    $_SESSION['username'] = $resultat['username'];
    $_SESSION['prenom'] = $resultat['prenom'];
    $_SESSION['nom'] = $resultat['nom'];
    $_SESSION['question'] = $resultat['question'];
    $_SESSION['reponse'] = $resultat['reponse'];
    header('location: ../recuperation_2.php');
}
?>