<?php
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    //Ici c'est plutot dans le cas ou on change l'id manuellement dans l'url
    $_SESSION["id_erreur"] = 404;
    $_SESSION["erreur_message"] = "La page que vous avez demandée n’a pas été trouvée.<br />Il se peut que le lien que vous avez utilisé soit rompu ou que vous ayez tapé l’adresse (URL) incorrectement.";
    include("modules/erreur/init.php");
} else {
    //si on trouve pas l'user on affiche un message d'erreur
    $usersToGet = new UsersDB($db);
    $usersToGet->getUsersByLogin($_GET["id"]);
    if ($usersToGet->get_id_users() == -1) {
        $_SESSION["id_erreur"] = 500;
        $_SESSION["erreur_message"] = "Aucun utilisateur avec l'identifiant <i class=\"fa fa-angle-double-left\"></i> " . $_GET["id"] . " <i class=\"fa fa-angle-double-right\"></i> n'a pu être trouvé.";
        //$_SESSION["id_users"] = get_id_users();
        include("modules/erreur/init.php");
    } else {
        var_dump($_SESSION["id_user"]);
        //$_SESSION["id_user"] = get_id_users();
        //$_SESSION["id_users"] = get_id_users();
        //si pas on affiche ismplement ses coordonnées
        ?>
        <div class="row" id="profil">
            <div class="medium-3 columns">
                <div id="profil-avatar" class="text-center">
                    <img src="img/nba.png" />
                    <br /><br /><a href="index.php?module=membre&action=profil_users&id=<?php echo $usersToGet->get_login(); ?>"><?php echo $usersToGet->get_login(); ?></a>
                </div>
                <?php
                if ($_GET["id"] == $_SESSION["login"]) {
                    ?>

                    <div class="profil-menu-logout" onclick="location.href = 'index.php?action=logout'">
                        <i class="fa fa-sign-out" style="color:#C0392B;"></i> Deconnexion
                    </div>
                    <?php
                }
?>
            </div>
            <div class="medium-9 columns">
                <div class="profil-header">
                    Informations du compte
                </div>
                <div class="profil-content">
                    <div class="row">
                        <div class="medium-6 columns">
                            <table class="table-clear w-max table-profil">
                                <tr>
                                    <td style="width: 30%;"><b>Nom</b></td>
                                    <td>: <?php echo $usersToGet->get_nom(); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Prénom</b></td>
                                    <td>: <?php echo $usersToGet->get_prenom(); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Adresse</b></td>
                                    <td>: <?php echo $usersToGet->get_adresse(); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="medium-6 columns">
                            <table class="table-clear w-max table-profil">
                                <tr>
                                    <td style="width: 30%;"><b>E-mail</b></td>
                                    <td>: <?php echo $usersToGet->get_email(); ?></td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td><b>Pseudo</b></td>
                                     <td>: <?php echo $usersToGet->get_login(); ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>