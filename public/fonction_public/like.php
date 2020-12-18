<?php 
    session_start();
    require_once "../../fonctions/bdd_redacteur.php";

    $id_user = $_SESSION['id'];
    $id_acteur = $_SESSION['id_acteur'];
 
    // on cherche si l'utilisateur a déjà poster un like ou un dislike pour lui en donner l'autorisation 
    $vote_check = $bdd->prepare("SELECT id_user, id_acteur FROM vote WHERE id_user = :id_user AND id_acteur = :id_acteur");
    $vote_check ->execute(array(
        'id_user' => $id_user,
        'id_acteur' => $id_acteur
    ));
    $vote_right = $vote_check->fetch();

    // si l'utilisateur qu'on a vérifié n'a pas déjà liké/disliké, on lui autorise et on rendre son vote dans la bdd
    if($vote_right) {

        header('Location: ../partenaire.php?id_acteur='. $_SESSION['id_acteur'].'&vote=no');

    } else {
        if ($_GET['t'] == 'like'){
            $like = $bdd->prepare('INSERT INTO vote(id_user, id_acteur, vote) VALUES(:id_user, :id_acteur, :vote)');
            $like->execute(array(
                'id_user' => $id_user,
                'id_acteur' => $id_acteur,
                'vote' => "1"
            ));
        
            header ('Location: ../partenaire.php?id_acteur='. $_SESSION['id_acteur']);
        
        } elseif ($_GET['t'] == 'dislike') {
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