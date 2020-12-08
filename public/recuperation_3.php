<?php
session_start();
$title = "Mot de passe oublié";
require_once 'composants/header.php';
?>
    <!-- Section principale - formulaire de récuperation du mot de passe -->
    <div class="connect_form">
        <form action="fonction_public/recup_3_fonction.php" method="POST">
            <div>
                <h3>Mot de passe oublié?</h3>
                <h4>Saississez votre nouveau mot de passe</h4>
            </div>
<?php if(array_key_exists('nmp', $_GET)){ ?> 
    <div id="alert"><p>Les nouveaux mot de passe ne correspondent pas !</p></div>
<?php } ?>
            <div>
                <label for="new_password"> Nouveau mot de passe</label><br>
                <input type="password"  name="new_password" required>
            </div>
            <div>
                <label for="confirm_new_password"> Confirmer le nouveau mot de passe</label><br>
                <input type="password"  name="confirm_new_password" required>
            </div>
            <div>
                <input type="submit" value="VALIDER">
            </div>
        </form>
    </div>

<?php 
require_once 'composants/footer.php';
?>