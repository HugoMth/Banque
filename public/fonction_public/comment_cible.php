<?php
session_start();
require_once '../../fonctions/bdd_redacteur.php';

require_once "autorisation_com.php";

if($com_right) {
    header('Location: ../partenaire.php?id_acteur='. $id_acteur . '&com=no');

} else{
    // inserer les valeures dans la table post les données demandées (id_user et id_acteur etant récupéré via les paramettre de session)
    $donnees_com = $bdd->prepare('INSERT INTO post(id_user, id_acteur, date_add, post) VALUES(:id_user, :id_acteur, NOW(), :post)');
    $donnees_com->execute(array(
    'id_user' => $id_user,
    'id_acteur' => $id_acteur,
    'post' => $_POST['post']
    ));

    header('Location: ../partenaire.php?id_acteur='. $id_acteur);
 }
 
//     header('Location: ../partenaire.php?id_acteur='. $id_acteur . '&com=no');
// }


?>