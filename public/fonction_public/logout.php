<?php
// on désinitialise les fonctions session appelé lors de la session 
session_start();
unset($_SESSION['connected']);
unset($_SESSION['id']);
unset($_SESSION['prenom']);
unset($_SESSION['nom']);
unset($_SESSION['username']);
unset($_SESSION['question']);
unset($_SESSION['reponse']);
unset($_SESSION['id_acteur']);
header ('Location: ../connexion.php');
?>