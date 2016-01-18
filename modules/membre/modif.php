<?php
$edit = 0;
$ok = 0;
$erreur = "";
if (isset($_POST["info"])) {
    $edit = 1;
    $usersToEdit = new UsersDB($db);
    $usersToEdit->setEdit($_SESSION["id_user"], $_POST["nom"], $_POST["prenom"], $_POST["adresse"]);
    if ($usersToEdit->update()) {
        $ok = 1;
    } else {
        $erreur = "Problème lors de la mise à jour !";
    }
}
if (isset($_POST["mdp"])) {
    $edit = 2;
    if (isset($_POST["password1"]) && isset($_POST["password2"])) {
             if ($_POST["password1"] == $_POST["password2"]) {
                $usersToEdit = new UsersDB($db);
                if ($usersToEdit->setPassword($_SESSION["id_user"], md5(md5($_POST["password1"])))) {
                    $ok = 1;
                } else {
                    $erreur = "Problème lors de  la mise à jour !";
                }
            } else {
                $erreur = "Ils ne correspondent pas !";
            }
        
    } else {
        $erreur = "Les champs sont vides !";
    }
}
$usersToGet = new UsersDB($db);
$usersToGet->getUsersByLogin($_SESSION["login"]);

?>
    <div class="row" id="profil">
        <div class="medium-12">
            <div class="profil-header">
                Profil
            </div>
            <div class="profil-content">
                <?php
                if ($edit == 1) {
                    if ($ok == 1) {
                        ?>
                        <div class="medium-12">
                            <div id="box-update" data-alert class="alert-box success">
                                La mise à jour a été faite avec succès !
                                <a href="#" class="close">&times;</a>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="medium-12">
                            <div  id="box-update" data-alert class="alert-box alert ">
                                <?php echo $erreur; ?>
                                <a href="#" class="close">&times;</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <script>
                        $("html, body").animate({
                            scrollTop: $("#box-update").offset().top - 10
                        }, 1000);
                    </script>
                    <?php
                }
                ?>
                <form action="#" method="post">
                    <div class="row" style="margin-top:20px;">
                        <div class="medium-5 columns" style="margin-left:50px;">
                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="Nom-label" class="right inline"><b>Nom</b></label>
                                </div>
                                <div class="small-9 columns">
                                    <input name="nom" type="text" id="Nom-label" placeholder="<?php echo $usersToGet->get_nom(); ?>" value="<?php echo $usersToGet->get_nom(); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="Adresse-label" class="right inline"><b>Adresse</b></label>
                                </div>
                                <div class="small-9 columns">
                                    <input name="adresse" type="text" id="Adresse-label" placeholder="<?php echo $usersToGet->get_adresse(); ?>" value="<?php echo $usersToGet->get_adresse(); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="Prenom-label" class="right inline"><b>Prenom</b></label>
                                </div>
                                <div class="small-9 columns">
                                    <input name="prenom" type="text" id="Prenom-label" placeholder="<?php echo $usersToGet->get_prenom(); ?>" value="<?php echo $usersToGet->get_prenom(); ?>">
                                </div>
                            </div>
                        </div>   
                    </div>
                            
            <div class="row">
                        <div class="small-12 columns text-center">
                            <input type="submit" name="info" class="button btn-send" style="margin-bottom: 0px;" value="Mettre à jour"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="profil-header">
                Modifier mon mot de passe
            </div>
            <form action="#" method="post">
                <div class="profil-content">  
                    <?php
                    if ($edit == 2) {
                        if ($ok == 1) {
                            ?>
                            <div class="medium-12">
                                <div id="box-password" data-alert class="alert-box success">
                                    La mise à jour a été faite avec succès !
                                    <a href="#" class="close">&times;</a>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="medium-12">
                                <div id="box-password" data-alert class="alert-box alert ">
                                    <?php echo $erreur; ?>
                                    <a href="#" class="close">&times;</a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <script>
                            $("html, body").animate({
                                scrollTop: $("#box-password").offset().top - 10
                            }, 1000);
                        </script>
                        <?php
                    }
                    ?>  
                    <div class="row" style="margin-top:20px;">
                        <div class="medium-5 columns" style="margin-left:50px;">
                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="Password-label" class="right inline"><b>Mot de passe</b></label>
                                </div>
                                <div class="small-9 columns">
                                    <input name="password1" type="text" id="Password-label" placeholder="[1/2] Nouveau mot de passe">
                                </div>
                            </div>
                        </div>
                        <div class="medium-5 columns" style="margin-right:100px;">
                            <div class="row">
                                <div class="small-3 columns">
                                    <label for="Password-label" class="right inline"><b>Mot de passe</b></label>
                                </div>
                                <div class="small-9 columns">
                                    <input name="password2" type="text" id="Password-label" placeholder="[2/2] Comfirmer mot de passe">
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="small-12 columns text-center">
                            <input name="mdp" type="submit" class="button btn-send" style="margin-bottom: 0px;" value="Mettre à jour"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
