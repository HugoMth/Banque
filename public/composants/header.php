<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="images/logo_gbaf.png"/>
    <title>GBAF | <?php echo $title; ?></title>
</head>
<body>
    <!-- Header et navigation -->
    <header>
        <div id="logo">
            <a href="index.php">
            <img src="images/logo_gbaf.png" alt="logo_gbaf">
            </a>
        </div>
        <?php
        // si il y a une session et que le parametre session "connected" n'est pas egale à 0 alors afficher le bouton nom/prenom et celui de deconnexion
            if (session_status() === PHP_SESSION_ACTIVE  AND !empty($_SESSION['connected'])){ ?>
        <div class="navbar">
            <a href="parametres_compte.php"><img src="images/user.png" alt="icone user" class="icone"><?php echo ' ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?></a>
            <a href="fonction_public/logout.php"><img src="images/logout.png" alt="icone sign out" class="icone"> Déconnexion</a>
        </div>
        <?php  }?>
    </header>
