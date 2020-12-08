<?php
session_start();
require_once '../../fonctions/bdd_redacteur.php';

// selectionner le mot de passe par rapport au paramettre de la session id_user
$id_change = $_SESSION['id'];
$req = $bdd->prepare('SELECT password FROM account WHERE id_user = :id');
$req->execute(array(
    'id' => $id_change,
));
$resultat = $req->fetch();

// dehacher le mot de passe et verifier qu'il correspond 
$ispasswordcorrect = password_verify($_POST['password'], $resultat['password']);
// si le mot de passe est exact on peut commencer les autres vérifications
if(!empty($ispasswordcorrect)) {
    // si les champs nouveau mot de passe et sa confirmation son vide, on ne modifie seulement les autres champs ( il y a un require dans l'html pour pas que les autres champs soit remplacés par du vide)
    if(empty($_POST['new_password']) AND empty($_POST['confirm_new_password'])) {
        $new_data = $bdd->prepare("UPDATE account SET prenom = :prenom, nom = :nom, username = :username, question = :question, reponse = :reponse  WHERE id_user = :id");
        $new_data->execute(array(
        'id' => $id_change,
        'prenom' => $_POST['prenom'],
        'nom' => $_POST['nom'],
        'username' => $_POST['username'],
        'question' => $_POST['question'],
        'reponse' => $_POST['reponse']
        ));

        // on redefinit les paramettres de session pour que ces paramettres se mettent à jour sans avoir à quitter la session
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['question'] = $_POST['question'];
            $_SESSION['reponse'] = $_POST['reponse'];

        header('Location: ../parametres_compte.php');
    }

    // si les champs nouveau mot de passe et sa confirmation ne sont pas vide et qu'ils correspondent entre eux, on modifie tout les champs
    else {
        if($_POST['new_password'] == $_POST['confirm_new_password']) {

            $pass_hache = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

            $new_data = $bdd->prepare("UPDATE account SET prenom = :prenom, nom = :nom, username = :username, password = :new_password, question = :question, reponse = :reponse  WHERE id_user = :id");
            $new_data->execute(array(
            'id' => $id_change,
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'username' => $_POST['username'],
            'new_password' => $pass_hache,
            'question' => $_POST['question'],
            'reponse' => $_POST['reponse']
            ));
            
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['question'] = $_POST['question'];
            $_SESSION['reponse'] = $_POST['reponse'];

        header('Location: ../parametres_compte.php');

        }
        // on renvois à la page si les deux nouveau mot de passe ne correspondent pas
        else {
            header('Location: ../parametres_compte.php?nmp=nomatch');
        }

    }

    

}

// on renvois à la page si le mot de passe actuel n'est pas correcte
else {
    header('Location: ../parametres_compte.php?mpa=inco');
}
?>