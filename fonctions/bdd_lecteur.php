<?php
include_once 'password.php';
// connection à la base de donnée en mode lecture uniquement
$bdd = new PDO('mysql:host=localhost;dbname=partenaires;charset=utf8', $lecteurUser, $lecteurPassword);
?>