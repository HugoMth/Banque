<?php
    // on teste la fonction 'user_connected' pour laisser ou non l'accès à la page
    require_once 'fonction_public/try_session.php';
    user_connected();
    
    $_SESSION['id_acteur'] = $_GET['id_acteur'];
    $title = "Partenaire";
    require_once 'composants/header.php';
?>
<?php 
    include_once ("../fonctions/bdd_partenaire.php");

    // on créer une boucle qui sert à afficher les données récupérer dans bdd_partenaire. La page est dynamique en fonction de l'id_acteur renvoyé par l'index.
    while ($donnees = $requete->fetch()) { ?>
            
        <!-- section partenaire -->
        <section class="page_partenaire">
            <div class="inner_partenaire">
                <div class="image_partenaire">
                        <img src="images/<?php echo $donnees['logo'] ; ?>" alt="<?php echo $donnees['logo_alt']; ?>">
                </div>
                <div>
                        <h2><?php echo $donnees['acteur']?></h2>
                        <a href=""><?php echo $donnees['site']; ?></a>
                        <p><?php echo nl2br($donnees['description']); ?></p>
                </div>
            </div>
        </section>
        <div class="separateur"></div>
<?php }; ?>

<!-- on va chercher le nombre de likes, de dislikes et le nmbre de commentaire dans la base de donnée-->
<?php
    require_once "fonction_public/vote_com_count.php"
?>

<!-- Section commentaire -->
<section class="commentaire">
    <div>
        <h4><?php echo $comment_nb . ' commentaires'; ?></h4>
    </div>
    <div class="like_button">
        <a href="fonction_public/like.php?t=like&id_acteur= <?php echo $_SESSION['id_acteur']; ?>"><img src="images/thumb_up.png" alt="icone user" class="icone_like"> (<?php echo $likes;?>)</a> 
        <a href="fonction_public/like.php?t=dislike&id_acteur=<?php echo $_SESSION['id_acteur']; ?>"><img src="images/thumb_down.png" alt="icone user" class="icone_like"> (<?php echo $dislikes;?>)</a> 
    </div>

<!-- section d'affichage des commentaires -->
<?php 
    require_once 'fonction_public/comment.php';

    // on affiche ici sous forme de boucle les commentaires selectionnés par 'comment.php'
    while( $donnees_com = $comment_rep->fetch()) { ?>
            <div class="com">
                <p><?php echo $donnees_com['prenom']; ?></p>
                <p><?php echo $donnees_com['date_add']; ?></p>
                <p><?php echo $donnees_com['post']; ?></p>
            </div>
<?php }  ?>

<!-- section d'entrée de nouveaux commentaires -->
<?php 
    // on fait apparaitre ou non le formulaire de commentaire (en fonction de si l'utilisateur a déjà commenté)
    require_once "fonction_public/autorisation_com.php";

    if (!$com_right) { ?>

        <!-- Formulaire de commentaire -->
        <div class="com_form">
            <form action="fonction_public/comment_cible.php" method="POST">
                <div>
                    <h5>Avez-vous un commentaire?</h5>
                </div>
                <div>
                    <textarea id="msg" name="post"></textarea>
                </div>
                <div>
                    <input type="submit">
                </div>
            </form>
        </div>
<?php } ?> 
</section>

<?php
    require_once 'composants/footer.php';
?>