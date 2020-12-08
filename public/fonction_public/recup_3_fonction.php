<?php
session_start();
require_once '../../fonctions/bdd_redacteur.php';

$id = $_SESSION['id'];
// on verifie que les deux nouveaux mot de passe rentrés correspondent 
if($_POST['new_password'] == $_POST['confirm_new_password']){
    // on hache le nouveaux mot de passe
    $pass_hache = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
    // on remplace le mot de passe oublié par le nouveau mot de passe
    $new_data = $bdd->prepare("UPDATE account SET password = :new_password WHERE id_user = :id");
    $new_data->execute(array(
    'new_password' => $pass_hache,
    'id' => $id,
    ));

    header('Location: ../connexion.php');
} else {
    header('Location: ../recuperation_3.php?nmp=nom');
}
?>