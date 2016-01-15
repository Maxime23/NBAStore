<?php
require 'include/classes/users.class.php';
require 'include/classes/usersDB.class.php';
$erreur = 0;
$login = 0;
$erreurTab = array();
if ($_POST) {
    // test si on a recup un login et si il est pas vide
    if (isset($_POST["login"]) && !empty($_POST["login"])) {
        
    } else {
        $erreur = $erreur + 1;
        $erreurTab[$erreur] = "Le login est vide.";
    }
    //pareil mdp
    if (isset($_POST["password"]) && !empty($_POST["password"])) {
        
    } else {
        $erreur = $erreur + 1;
        $erreurTab[$erreur] = "Le password est vide.";
    }
    // si on a tout recup on recherche le login dans la bd
    if ($erreur == 0) {
        $usersToLogin = new UsersDB($db);
        $usersToLogin->getUsersByLogin($_POST["login"]);
        if ($usersToLogin->get_id_users() == -1) {
            //Si on trouve pas d'id correspondant donc si il est tjs a -1 comme dans usersDB on incrémente l'erreur
            $erreur++;
            $erreurTab[$erreur] = "Ce login n'existe pas dans la base de donnée.";
        }
        //Pareil pour mdp
        if ($erreur == 0) {
            $usersToLogin->connexion($_POST["login"], md5(md5($_POST["password"])));
            if ($usersToLogin->get_id_users() != -1) {
                $login = 1;
                $_SESSION["id_user"] = $usersToLogin->get_id_users();
                $_SESSION["login"] = $usersToLogin->get_login();
            } else {
                $erreur = $erreur + 1;
                $erreurTab[$erreur] = "Le mot de passe est incorrecte.";
            }
        }
    }
}
?>
<div class="row" id="equipe">
    <div class="medium-12">
        <?php if ($erreur > 0) { ?>
            <div data-alert class="alert-box alert">
                <?php
    //C'est ici qu'on va afficher toutes les erreurs
                foreach ($erreurTab as $key => $value) {
                    echo "Erreur #$key : $value<br />";
                }
                ?>
                <a href="#" class="close">&times;</a>
            </div>
        <?php } ?>
        
        <?php if ($login == 1) { 
        //Si c'est bon alors on va afficher la suite
        //petit effet qu'il faut un temps de recherche dans la bd . vive boostrap c'est trop bien ?>
            <div data-alert class="alert-box success">
                <i class="fa fa-circle-o-notch fa-spin"></i> Connexion en cours ...
                <a href="#" class="close">&times;</a>
            </div>
            <meta http-equiv="refresh" content="3;URL='index.php?module=membre&action=profil_users&id=<?php echo $_SESSION["login"]; ?>'" />  
        <?php } ?>
        <div class="row" style="padding-left:33%;">
            <div class="medium-6 columns">
                <div class="signup-panel">
                    <p class="welcome"> Connexion</p>
                    <form action="#" method="post">
                        <div class="row collapse">
                            <div class="small-2  columns">
                                <span class="prefix"><i class="fa fa-user"></i></span>
                            </div>
                            <div class="small-10  columns">
                                <input type="text" placeholder="Votre login" name="login" <?php if ($login == 1) echo "disabled"; ?>>
                            </div>
                        </div>
                        <div class="row collapse">
                            <div class="small-2 columns">
                                <span class="prefix"><i class="fa fa-lock"></i></span>
                            </div>
                            <div class="small-10  columns">
                                <input type="password" placeholder="Votre mot de passe" name="password" <?php if ($login == 1) echo "disabled"; ?>>
                            </div>
                        </div>
                        <span>
                            <?php
                            if ($login == 1) {
                                ?>

                                <center>
                                    <span class="button btn-send" style="margin-left:0;" value="" >Se connecter</span>
                                    <span class="button btn-back" style="margin-left:0;" value="" >Annuler</span>
                                </center>
                                <?php
                            } else {
                                ?>
                                <center>
                                    <input type="submit" class="button btn-send" style="margin-left:0;" value="Se connecter" />
                                    <input type="reset" class="button btn-back" style="margin-left:0;" value="Annuler" />
                                </center>
                                <?php
                            }
                            ?>
                        </span>

                    </form>
                    <ul class="disc">
                        <li><a href="index.php?module=login&action=inscription" style="color:#008CBA;">Mot de passe oublié ?</a></li>
                        <li><a href="index.php?module=login&action=inscription" style="color:#008CBA;">Créer un compte maintenant !</a></li>
                    </ul>
                </div>
            </div>
        </div>   
    </div>
</div>