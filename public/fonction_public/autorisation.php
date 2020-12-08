<?php
   $id_user = $_SESSION['id'];
   $id_acteur = $_SESSION['id_acteur'];
   $vote_check = $bdd->prepare("SELECT id_user, id_acteur FROM vote WHERE id_user = :id_user AND id_acteur = :id_acteur");
   $vote_check ->execute(array(
       'id_user' => $id_user,
       'id_acteur' => $id_acteur
   ));
   $vote_right = $vote_check->fetch();

?>