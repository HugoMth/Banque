<?php
  $id_user = $_SESSION['id'];
  $id_acteur = $_SESSION['id_acteur'];
  $com_check = $bdd->prepare("SELECT id_user, id_acteur FROM post WHERE id_user = :id_user AND id_acteur = :id_acteur");
  $com_check ->execute(array(
      'id_user' => $id_user,
      'id_acteur' => $id_acteur
  ));
  $com_right = $com_check->fetch();

?>