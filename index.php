<?php
//Lancement de la session
session_start();
$_SESSION["id_erreur"] = "";
//Si on clique sur deconnecter, on se deconnecte en faisant session_destroy
if (isset($_GET["action"])) {
    if ($_GET["action"] == "logout") {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
//ces  include sont necessaire des le lancement du projet
require 'include/db_connexion.php';
require 'include/classes/connexion.php';
include("include/autoload.php");
//On recup la connex
$db = Connexion::getInstance($dsn, $user, $pass);
include('include/header.php');
//on genere l'erreur 40000 si on a pas pu se co a la bd ( numéro d'erreur trouver sur un site pour les associer )
if ($_SESSION["id_erreur"] == 40000) {
    include("modules/erreur/init.php");
} else {
    //on charge
    if (!isset($_GET['module']) || empty($_GET['module'])) {
        $_GET['module'] = "accueil";
    }
    $page = $_GET['module'];
    $pageName = "modules/" . $page . "/init.php";
    if (file_exists($pageName)) {
        include($pageName);
    } else {
        $_SESSION["id_erreur"] = 404;
        $_SESSION["erreur_message"] = "La page que vous avez demandée n’a pas été trouvée.<br />Il se peut que le lien que vous avez utilisé soit rompu ou que vous ayez tapé l’adresse (URL) incorrectement.<br /><a href='index.php?mdule=accueil'>Retour a l'accueil</a>";
        include("modules/erreur/init.php");
    }
}

include('include/footer.php');
?>