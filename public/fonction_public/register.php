<?php
    //connexion à la base de donnée
    require_once '../../fonctions/bdd_redacteur.php';

    //vérifier sur le pseudo est libre
    $username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_name_check = $bdd->prepare("SELECT * FROM account WHERE username=?");
    $user_name_check->execute([$username]); 
    $user_exist = $user_name_check->fetch();

    // si le nom d'utilisateur existe déjà
    if ($user_exist){
        header('Location: ../inscription.php?username=taken');

    //vérifier que les deux mot de passe sont bien les memes
    } else {
        if ($_POST['password'] != $_POST['confirm_password']){
            header('Location: ../inscription.php?cpassword=no');

        // enregistrer les nouvelles infos dans la base de données
        } else {
            
            //hachage du mot de passe 
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

            //insertion des données du nouveau utilisateur
            $new_data = $bdd->prepare('INSERT INTO account(nom, prenom, username, password, question, reponse ) VALUES(:nom, :prenom, :username, :password, :question, :reponse)');
            $new_data->execute(array(
                'nom' => filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'prenom' => filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'username' => $username,
                'password' => filter_var($pass_hache,FILTER_SANITIZE_FULL_SPECIAL_CHARS), 
                'question' => filter_var($_POST['question'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'reponse' => filter_var($_POST['reponse'],FILTER_SANITIZE_FULL_SPECIAL_CHARS),
            ));

            header('Location: ../index.php');
        }
    } 
?>