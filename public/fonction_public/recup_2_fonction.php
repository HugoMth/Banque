<?php
session_start();
require_once '../../fonctions/bdd_lecteur.php';

$id = $_SESSION['id'];
$req = $bdd->prepare('SELECT reponse FROM account WHERE id_user = :id');
$req->execute(array(
    'id' => $id));
$resultat = $req->fetch();

// on vérifie que la reponse à la question secrete corresponde bien à celle enregistrer pour cet utilisateur
if($resultat['reponse'] == $_POST['reponse']) {
    header('Location: ../recuperation_3.php');
} else {
    header('Location: ../recuperation_2.php?quest=no');
}
?>