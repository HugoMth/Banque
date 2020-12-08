<?php
$title = "Inscription";
require_once 'composants/header.php';
?>
    <!-- Section principale - formulaire d'inscription-->
    <div class="connect_form">       
        <form action="fonction_public/register.php" method="POST">
            <div>
                <h3>Inscription</h3>
            </div>
<?php if(isset($_GET['username'])) { ?> 
    <div id="alert">
        <p>Le nom d'utilisateur est déjà pris !</p>
    </div>
<?php } ?>
<?php if(isset($_GET['cpassword'])) { ?>
    <div id="alert">
        <p>Les mots de passe ne correspondent pas !</p>
    </div>
<?php } ?>
            <div>
                <label for="first_name"> Prénom</label><br>
                <input type="text" id="first_name" name="prenom" required>
            </div>
            <div>
                <label for="name"> Nom</label><br>
                <input type="text" id="name" name="nom" required>
            </div>
            <div>
                <label for="user_name"> Nom d'utilisateur</label><br>
                <input type="text" id="user_name" name="username" required>
            </div>
            <div>
                <label for="password"> Mot de passe</label><br>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="confirm_password"> Confirmer le mot de passe</label><br>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div>
                <label for="secret_question"> Question secrète</label><br>
                <input type="text" id="secret_question" name="question" required>
            </div>
            <div>
                <label for="secret_answer"> Réponse à la question secrète</label><br>
                <input type="text" id="secret_answer" name="reponse" required>
            </div>
            <div id="accept_condition">
                <input type="checkbox" name="condition_utilisation" required>
                <label for="condition_utilisation">
                        <span> J'ai lu et j'accepte les <a href="#">Conditions Générales d'Utilisation</a> et la <a href="#">Politique de Protection des Données Personnelles</a>.
                        </span>
                    </label><br>

            </div>
            <div>
                <input type="submit" value="S'INSCRIRE">
            </div>
            <div id="already_account">
                <p>Vous avez déjà un compte? <a href="connexion.php">Connectez-vous ici.</a></p>
            </div>
        </form>
       
    </div>

 <?php
 require_once 'composants/footer.php'
 ?>