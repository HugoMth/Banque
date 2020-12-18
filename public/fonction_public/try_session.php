<?php
    // on créer une fonction qui demande si la session n'est pas lancée et on la lance si elle ne l'est pas mais seulement si le paramettre 'connected' renvoi quelque chose
    function is_connected (): bool {
        if( session_status() === PHP_SESSION_NONE){
            session_start();
        }
        
        return !empty($_SESSION['connected']);
    }

    // on créer une deuxième fonction qui demande si la fonction au dessus est bien valide. Si 'connected' ne renvois rien ( est egale à 0) alors on redirige le visiteur sur la page de connexion
    function user_connected(): void {
        if(!is_connected()){
            header('Location: connexion.php');
            exit();
        }
    }

?>