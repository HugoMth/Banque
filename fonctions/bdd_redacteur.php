<?php
include_once 'password.php';
// connexion à la base de donnée en mode ecriture/lecture
$bdd = new PDO('mysql:host=localhost;dbname=partenaires;charset=utf8', $redacteurUser, $redacteurPassword);
?>