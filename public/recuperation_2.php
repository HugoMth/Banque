<?php
    session_start();
    $title = "Mot de passe oublié";
    require_once 'composants/header.php';
?>

<!-- Section principale - formulaire de récuperation du mot de passe -->
<div class="connect_form">
    <form action="fonction_public/recup_2_fonction.php" method="POST">
        <div>
            <h3>Mot de passe oublié?</h3>
            <h4>Saississez la reponse à votre question secrete </h4>
        </div>

        <!-- message d'erreur -->
        <?php if(array_key_exists('quest', $_GET)) { ?> 
            <div id="alert">
                <p>Mauvaise réponse</p>
            </div>
        <?php } ?>
        
        <div>
            <label for="secret_question"> Votre question secrète</label><br>
            <p id="question"><?php echo $_SESSION['question']?>?</p>
        </div>
        <div>
            <label for="secret_answer"> Réponse à la question secrète</label><br>
            <input type="text" id="secret_answer" name="reponse" required>
        </div>
        <div>
            <input type="submit" value="VALIDER">
        </div>
    </form>
</div>

<?php 
    require_once 'composants/footer.php';
?>