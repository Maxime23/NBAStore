<?php
require 'include/classes/users.class.php';
require 'include/classes/usersDB.class.php';
$erreur = 0;
$inscription = false;
$erreurTab = array();
//On check si post est bien existant pour etre sur qu'on soit bien en etat de créer
    if ($_POST) {
    $userToRegister = new UsersDB($db);

    if ($erreur == 0) {
    //Si il y a pas d'erreur et que tout les champs sont rempli on les envoi a la bd avec la methode setAll qui est dans users.class.php et on met la variable $inscrpiton a true
        if (empty($_POST["nom"])) {
            if (empty($_POST["prenom"])) {
                if (empty($_POST["adresse"])) {
                    if (empty($_POST["mdp"])) {
                        if (empty($_POST["email"])) {
                            if (empty($_POST["login"])) {
            $_POST["nom"] = "";
            $_POST["prenom"] = "";
            $_POST["adresse"] = "";
            $_POST["mdp"] = "";
            $_POST["email"] = "";
            $_POST["login"] = "";
        }
                    }
                }
            }
            
        }
        
    }
        $user = new UsersDB($db);
        $user->setAll($_POST["nom"], $_POST["prenom"], $_POST["adresse"], $_POST["pass1"], $_POST["email"], $_POST["login"]);
        $user->createUsers();
        $inscription = true;
    }
    }

if ($inscription) {
    ?>
    <div class="row" id="equipe">
        <div class="medium-12">
            <center><h3>Inscription</h3></center>
            <!-- On le renvoi au formulaire de connexion -->
            Votre compte est maintenant prêt, vous pouvez vous connecter <a href="index.php?module=login&action=connexion">ici</a>.<br />
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="row" id="equipe">
        <div class="medium-12">
            <center><h3>Inscription</h3></center>
        </div>
        <?php if ($erreur > 0) { ?>
            <div data-alert class="alert-box alert">
                <?php
        // on affiche toutes les erreurs comme d'hab
                foreach ($erreurTab as $key => $value) {
                    echo "Erreur #$key : $value<br />";
                }
                ?>
                <a href="#" class="close">&times;</a>
            </div>
        <?php } ?>
        <div id="target-compte" class="profil-bio-header">
            Compte
        </div>
        <form action="index.php?module=login&action=inscription" method="post">
            <div class="profil-bio-content">        
                <div class="row" style="margin-top:20px;">
                    <div id="alert-compte-imcomplet" data-alert class="alert-box alert" style="display: none;">
                        Tout les champs doivent être remplis !
                        <a href="#" class="close">&times;</a>
                    </div>
                    <div class="medium-5 columns" style="margin-left:50px;">
                        <div class="row">
                            <div class="small-3 columns">
                                <label for="nom-label" class="right inline"><b>Nom</b></label>
                            </div>
                            <div class="small-9 columns">
                                <input class="inscriptionProgressRequis" type="text" id="nom-label" name="nom" placeholder="Votre nom">
                            </div>
                        </div>
                            <div class="row">
                            <div class="small-3 columns">
                                <label for="prenom-label" class="right inline"><b>Prénom</b></label>
                            </div>
                            <div class="small-9 columns">
                                <input class="inscriptionProgressRequis" type="text" id="prenom-label" name="prenom" placeholder="Votre prénom">
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-3 columns">
                                <label for="adresse-label" class="right inline"><b>Adresse</b></label>
                            </div>
                            <div class="small-9 columns">
                                <input class="inscriptionProgressRequis" type="text" id="adresse-label" name="adresse" placeholder="Votre adresse postale">
                            </div>
                        </div>
                    </div>
                    <div class="medium-5 columns" style="margin-right:100px;">
                        <div class="row">
                            <div class="small-3 columns">
                                <label for="email-label" class="right inline"><b>E-mail</b></label>
                            </div>
                            <div class="small-9 columns">
                                <input class="inscriptionProgressRequis" type="text" id="email-label" name="email" placeholder="Votre adresse e-mail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-3 columns">
                                <label for="Password1-label" class="right inline"><b>Password</b></label>
                            </div>
                            <div class="small-9 columns">
                                <input class="inscriptionProgressRequis" type="text" id="password1-label" name="pass1" placeholder="Votre mot de passe">
                            </div>
                        </div>
                        <div class="row">
                            <div class="small-3 columns">
                                <label for="login-label" class="right inline"><b>Login</b></label>
                            </div>
                            <div class="small-9 columns">
                                <input class="inscriptionProgressRequis" type="text" id="login-label" name="login" placeholder="Votre pseudo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profil-bio-header">
                Inscription
            </div>
            <div class="profil-bio-content">        
                <div class="row" style="margin-top:20px;">
                    <div class="medium-8 columns" style="margin-left:20%;">
                        <div class="row">
                            <b>Progression</b> [ <span id="requis-label">0</span>/6 ]
                            <div id="progress-requis-class" class="progress alert">
                                <span id="progress-requis" class="meter" style="width:0%"></span>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns text-center">
                            <input type="submit" class="button profil-moderation-btn" style="margin-top: 10px;margin-bottom: 0px;" value="S'inscrire maitenant"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        // petit script pour la progress bar
        function checkProgressRequis() {
            $pc = 0;
            $count = 0;
            $(".inscriptionProgressRequis").each(function() {
                //si les valeurs sont pas vide on divise par 6 et a chaque fois qu'on en rempli une on fait +1
                if ($(this).val() !== "") {
                    $pc = $pc + (100 / 6);
                    $count = $count + 1;
                }
            });
            //Si il est a 6
            if ($count == 6) {
                //On vire la classe alerte donc on retire les messages d'erreurs eventuels
                $("#progress-requis-class").removeClass("alert");
                //Et on ajoute success(classe bootstrap)
                $("#progress-requis-class").addClass("success");
            } else {
                //sinon on fait l'inverse
                $("#progress-requis-class").removeClass("success");
                $("#progress-requis-class").addClass("alert");
            }
            // on va animer la barre 
            $("#progress-requis").animate({width: $pc + "%"});
            $("#requis-label").text($count);
        }

        $(".inscriptionProgressRequis").change(function() {
            checkProgressRequis();
        });
        //si il envoi le formulaire donc s'il pense avoir fini 
        $("form").submit(function(event) {
            //on remet le count a 0 et apres on va recompter les données
            $count = 0;
            $(".inscriptionProgressRequis").each(function() {
                if ($(this).val() !== "") {
                    $count = $count + 1;
                }
            });
            //s'il vaut 6 ok pas de probleme
            if ($count == 6) {
                return;
            } else {
                //Si pas on affiche une alerte que c'est incomplet
                //Le slideDown va faire descendre  le message
                //Le delay est le temps qu'il va rester a l'ecran en miliseconde
                //le slideUp c'est l'inverse du slideDown
                $("#alert-compte-imcomplet").slideDown("slow").delay(6000).slideUp("slow");
                //On va animer la page encore
                $("html, body").animate({
                    // un peu difficile a expliquer en gros le scrollTop va prendre la position de la scrollbar pour le premier element
                    // et le offset lui il va recup les coordonnées et top c'est les coordonnées top
                    scrollTop: $("#target-compte").offset().top - 10
                }, 1000);
                // l'aciton par defaut ne sera pas déclanchée
                event.preventDefault();
            }
        });
    </script>

    <?php
}
?>