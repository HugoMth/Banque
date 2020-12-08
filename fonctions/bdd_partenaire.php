<?php
require_once 'bdd_redacteur.php';?>
<?php 
// selection dans la bdd de toutes les infos de la table acteur par rapport à l'id acteur selectionné par la session
        $requete = $bdd->prepare('SELECT * FROM acteur WHERE id_acteur= :id');        
        $requete->execute(array(
               'id'=> $_SESSION['id_acteur']));
?>
                