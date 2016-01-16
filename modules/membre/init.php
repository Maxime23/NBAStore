<?php
// pareil les méthode init sont tjs les meme dans chaque modules
if (!isset($_SESSION["id_user"])) {
    $_SESSION["id_erreur"] = "401";
    $_SESSION["erreur_message"] = 'Veuillez vous connectez pour accéder a cette page.<br />';
    $_SESSION["erreur_message"] .= '<a href="index.php?modules=acces&action=connexion" style="color:#333333;">Se connecter</a>';
    include('modules/erreur/init.php');
} else {
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "profil_users") {
            include('profil_users.php');
        } 
    }
}
?>