<?php
require_once '../fonctions/bdd_lecteur.php';
$id_acteur = $_SESSION['id_acteur'];
$vote_likes = 1;
$vote_dislikes = 2;
$likes = $bdd->prepare('SELECT vote FROM vote WHERE vote = ? AND id_acteur = ?');
$likes->execute(array(
    $vote_likes,
    $id_acteur,
));
$likes = $likes->rowCount(); 

$dislikes = $bdd->prepare('SELECT vote FROM vote WHERE vote = ? AND id_acteur = ?');
$dislikes->execute(array(
    $vote_dislikes,
    $id_acteur,
));
$dislikes = $dislikes->rowCount();

// on va chercher le nombre de commentaire dans la base de donnée
$comment_nb = $bdd->prepare('SELECT post FROM post WHERE id_acteur = ?');
$comment_nb->execute(array(
    $id_acteur,
));
$comment_nb = $comment_nb->rowCount(); 
?>