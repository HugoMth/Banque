<?php 
session_start();
require_once "../../fonctions/bdd_redacteur.php";
require_once "autorisation.php";

if($vote_right) {

    header('Location: ../partenaire.php?id_acteur='. $_SESSION['id_acteur'].'&vote=no');

} else{
    if ($_GET['t'] == 'like'){
        $like = $bdd->prepare('INSERT INTO vote(id_user, id_acteur, vote) VALUES(:id_user, :id_acteur, :vote)');
        $like->execute(array(
            'id_user' => $id_user,
            'id_acteur' => $id_acteur,
            'vote' => "1"
        ));
    
        header ('Location: ../partenaire.php?id_acteur='. $_SESSION['id_acteur']);
    
    } elseif ($_GET['t'] == 'dislike'){
        $like = $bdd->prepare('INSERT INTO vote(id_user, id_acteur, vote) VALUES(:id_user, :id_acteur, :vote)');
        $like->execute(array(
            'id_user' => $id_user,
            'id_acteur' => $id_acteur,
            'vote' => "2"
        ));
        header ('Location: ../partenaire.php?id_acteur='. $_SESSION['id_acteur']);
    }
    
}

?>