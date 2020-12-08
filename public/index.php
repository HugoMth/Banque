<?php 
    // on teste la fonction 'user_connected' pour laisser ou non l'accès à la page
    require_once 'fonction_public/try_session.php';
    user_connected();
    $title = "Acceuil";
    include_once 'composants/header.php';
?>

<!-- Section de présentation du site -->
<section id="section_titre">
    <h1>Groupement Banque Assurance Française</h1>
    <p>Le Groupement Banque Assurance Français est une fédération réprésentant les 6 grands groupes français que sont : Bnp Paribas, BPCE, Crédit Agricole, Crédit Mutuel-CIC,Société Générale et La Banque Postale. <br> Il est le représentant de la profession
        bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
    <div class="banniere"></div>
</section>

<!-- section de présentation du projet-->
<section id="section_projet">
    <h2>Notre Projet</h2>
    <p>Les produits et services bancaires sont nombreux et très variés. Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchent
        sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres. <br> Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les
        partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires. <br> Pour remédier à cela, le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand
        nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers. Chaque salarié pourra ainsi poster un commentaire et donner son avis.
    </p>
</section>

<!-- Section grid des pages partenaires -->
<section class="grid">
    <?php
    require_once '../fonctions/bdd_lecteur.php';

    // on selectionne toutes les données d'acteur.
    $reponse = $bdd->query('SELECT * FROM acteur'); 

    // On créer une boucle qui va afficher les données selectionnées tant qu'il y en a. On peut rajouter des lignes dans la table ou en supprimer et la page mettra à jour le post-grid des acteurs
    while($donnee = $reponse->fetch()) {?>
        <div class="partenaire">
            <img src=<?php echo "images/" . $donnee['logo']; ?> alt="<?php echo $donnee['logo_alt']; ?>">
            <h3><?php echo $donnee['acteur']; ?></h3>
            <p><?php echo substr(htmlspecialchars($donnee['description']),0, 110) . '...'; ?><a href="#"><?php echo $donnee['site']; ?></a></p>
            <a href="partenaire.php?id_acteur=<?php echo $donnee['id_acteur']; ?>" class="button_suite">Lire la suite</a>
        </div>
    <?php } ?>
</section>

<!-- footer -->
<?php
    require_once 'composants/footer.php';
?>