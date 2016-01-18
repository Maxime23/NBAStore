<?php
session_start();
$_SESSION["id_erreur"] = "";

if (isset($_GET["action"])) {
    if ($_GET["action"] == "logout") {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}

require 'include/db_connexion.php';
require 'include/classes/connexion.php';
include("include/autoload.php");
$db = Connexion::getInstance($dsn, $user, $pass);
include('include/header.php');
if ($_SESSION["id_erreur"] == 40000) {
    include("modules/erreur/init.php");
} else {
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