<?php 
    require_once "../fonctions/bdd_lecteur.php";

    // on selectionne les données dans account et on les lies à la table post via l'id_user qui est commain au deux tables. Les commentaires sont ensuite classés par ordre décroissant et limités à 5
    $comment_rep = $bdd->prepare ('SELECT account.id_user, prenom, id_acteur, date_add, post
    FROM account 
    INNER JOIN post ON account.id_user = post.id_user
    WHERE id_acteur = :id_acteur ORDER BY id_post DESC LIMIT 0, 5');
    $comment_rep -> execute(array(
                'id_acteur' => $_SESSION['id_acteur']
    ));
?>