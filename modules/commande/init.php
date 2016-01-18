<?php
if (!isset($_SESSION["id_user"])) {
    $_SESSION["id_erreur"] = "401";
    $_SESSION["erreur_message"] = 'Une connexion est requise pour continuer la navigation.<br />';
    $_SESSION["erreur_message"] .= '<a href="index.php?module=acces&action=connexion" style="color:#333333;">Se connecter</a>';
    include('modules/erreur/init.php');
} else {
    if(isset($_GET["action"])) {
        if ($_GET["action"] == "addcommande") {
            include('addcommande.php');
        }
            else{
    include('container.php');
    }

}        else {
    include('container.php');
        }

}
?>