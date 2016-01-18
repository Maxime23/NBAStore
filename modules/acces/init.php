<?php
//Methode init rien de plus normale on charge les pages en fonction des actions
if (isset($_GET["action"])) {
    if ($_GET["action"] == "connexion") {
        include('connexion.php');
    } else if ($_GET["action"] == "inscription") {
        include('inscription.php');
    }
} else {
    include('connexion.php');
}
?>