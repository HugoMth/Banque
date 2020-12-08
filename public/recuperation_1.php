<?php
$title = "Mot de passe oublié";
require_once 'composants/header.php';
?>

    <!-- Section principale - formulaire de récuperation du mot de passe -->
    <div class="connect_form" id="form_recuperation1">
        <form action="fonction_public/recup_1_fonction.php" method="POST">
            <div id="title_recup_1">
                <h3>Mot de passe oublié?</h3>
                <h4>Saississez votre nom d'utilisateur</h4>
            </div>
<?php if(array_key_exists('user', $_GET)) { ?> 
    <div id="alert"><p>Utilisateur non trouvé !</p></div>
<?php } ?>
            <div>
                <label for="user_name">Nom d'utilisateur</label><br>
                <input type="text" name="username">
            </div>
            <div>
                <input type="submit" value="Envoyer ma demande">
            </div>
        </form>
    </div>
<?php 
  require_once 'composants/footer.php';
?>