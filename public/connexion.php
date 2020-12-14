<?php
    $title = "Connexion";
    require_once 'composants/header.php';
?>

        <!-- Section principale - formulaire de Connexion-->
<div class="connect_form">
    <form action="fonction_public/login.php" method="POST">
        <div >
            <h3>Connexion</h3>
        </div>

        <!-- Message d'alerte -->
        <?php 
        if (array_key_exists('auth', $_GET)) { ?>
            <div id="alert">
                <p>Identifiant ou mot de passe incorrect !</p>
            </div>
        <?php } ?>

        <div>
            <label for="username"> Nom d'utilisateur</label><br>
            <input class="connect_field" type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur">
        </div>
        <div>
            <label for="password"> Mot de passe</label><br>
            <input class="connect_field" type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
        </div>
        <div id="password_forget">
            <a href="recuperation_1.php">Mot de passe oublié?</a>
        </div>
        <div>
            <input type="submit" value="SE CONNECTER">
        </div>
        <div id="inscription">
            <p>Vous n'avez pas encore de compte? <a href="inscription.php">Inscrivez-vous ici.</a></p>
        </div>
    </form>
</div>
    
    
<?php 
    require_once 'composants/footer.php';
 ?>