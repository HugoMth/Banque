<?php
session_start();
$title = "Paramètres du compte";
require_once 'composants/header.php';
?>
 <!-- Section principale - formulaire d'inscription-->
<div class="connect_form">

<form action="fonction_public/info_update.php" method="POST">
    <div>
        <h3>Parametres du compte</h3>
    </div>
<?php if(array_key_exists('mpa', $_GET)) { ?>
<div id="alert"><p>Veuilliez entrer le bon mot de passe.</p></div>
<?php } ?>
<?php if(array_key_exists('nmp', $_GET)){?>
    <div id="alert"><p>Les nouveaux mot de passe ne correspondent pas!</p></div>
<?php } ?>

    <div>
        <label for="first_name"> Prénom</label><br>
        <input type="text" id="first_name" name="prenom" required value= "<?php echo $_SESSION['prenom']?>">
    </div>
    <div>
        <label for="name"> Nom</label><br>
        <input type="text" id="name" name="nom" required value= "<?php echo $_SESSION['nom']?>">
    </div>
    <div>
        <label for="user_name"> Nom d'utilisateur</label><br>
        <input type="text" id="user_name" name="username" required value= "<?php echo $_SESSION['username']?>">
    </div>
    <div>
        <label for="password"> Mot de passe</label><br>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <label for="new_password"> Nouveau mot de passe</label><br>
        <input type="password" id="new_password" name="new_password">
    </div>
    <div>
        <label for="confirm_new_password"> Confirmer le nouveau mot de passe</label><br>
        <input type="password" id="confirm_new_password" name="confirm_new_password">
    </div>
    <div>
        <label for="secret_question"> Question secrète</label><br>
        <input type="text" id="secret_question" name="question" required value= "<?php echo $_SESSION['question']?>">
    </div>
    <div>
        <label for="secret_answer"> Réponse à la question secrète</label><br>
        <input type="password" id="secret_answer" name="reponse" value = "<?php echo $_SESSION['reponse']; ?>">
    </div>
    <div>
        <input type="submit" value="Mettre à jour les données">
    </div>
</form>
</div>

<?php
require_once 'composants/footer.php';
?>