<div class="row" id="container">
    <?php
    $Webmaster = "stocletm4xime@gmail.com";
    $erreurCount = 0;
    $erreurText = "";
    $isSend = 0;
    $sendOk = 0;
    if (isset($_POST["send"])) {
        //S'il envoi sans mail on genere une erreur
        if (empty($_POST["email"])) {
            $erreurCount = $erreurCount + 1;
            $erreurText .= "- L'email est vide<br>";
        }
        //S'il envoi sans contenu pareil
        if (empty($_POST["contenu"])) {
            $erreurCount = $erreurCount + 1;
            $erreurText .= "- Le contenu est vide<br>";
        }
        //Si pas d'erreur on envoi . Objet = NBAStore EU, je recup mon mail entré en dur. contenu et email recuperer du formulaire. Date recupérée aussi pour la mettre dans le mail
        if ($erreurCount == 0) {
            $objet = '[NBAStore EU]';
            $headers = 'From:' . $_POST["email"] . "\r\n" . 'To:' . $Webmaster . "\r\n" . 'Subject:' . $objet . "\r\n" . 'Content-type:text/plain;charset=iso-8859-1' . "\r\n" . 'Sent:' . date('l, F d, Y H:i');
            $isSend = 1;
            (mail($Webmaster, $objet, $_POST["contenu"], $headers));

        }
    }
    ?>
    <div class="medium-12 column">
        <center><h3>Contactez-nous !</h3></center>
        <?php
//message d'erreur
        if ($erreurCount > 0) {
            echo '<div data-alert class="alert-box alert">' . $erreurText . '<a href="#" class="close">&times;</a></div>';
        }
//message d'envoi
        if ($isSend == 1) {
                echo '<div data-alert class="alert-box succes">Votre mail a bien été envoyé !<a href="#" class="close">&times;</a></div>';
            } 
        
        ?>
        <form method="post" action="index.php?module=contact" style="width:50%;margin:auto;padding-top:20px;">
            <div class="row">
                <div class="medium-12 column">
                    <input type="text" name="email" placeholder="Votre adresse email" />
                </div>
            </div>
            <div class="row">
                <div class="medium-12 column">
                    <textarea name="contenu" placeholder="Votre message" style="height: 200px;"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="medium-12 column">
                    <center>
                        <input class="button btn-send" type="submit" name="send" value="Envoyer" />
                        <input class="button btn-send" type="reset" value="Annuler" />
                    </center>
                </div>
            </div>
        </form>

    </div>
    <!-- Google map -->
    <div class="row" style="padding:10px;">
        <div class="medium-6 column"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2371.302233282589!2d-       2.177300184138114!3d53.53451756830075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bb0afd06371ff%3A0xfd94ee8f9c416bcf!2sGreengate%2C+Middleton%2C+Manchester+M24%2C+Royaume-Uni!5e0!3m2!1sfr!2sbe!4v1451577726719" width="600" height="300" frameborder="0" style="border:0" ></iframe>
        </div>
        <div class="medium-6 column">
            <div class="panel" style="height: 300px;margin-left:10px;padding-left:180px;padding-top:70px;">
                <!-- Information de contact -->
                <h4>Contacts</h4>
                <ul class="no-bullet">
                    <li><span class="fa fa-phone "></span> +44 (0) 330 333 0251</li>
                    <li><span class="fa fa-location-arrow "></span> Kitbag Ltd Greengate M24</li>
                    <li><span style="padding-right: 22px;"></span>1FD, Manchester (England)</li>
                    <li><span class="fa fa-mail-reply"></span><a href="mailto:customer.services@nbastore.eu"> customer.services@nbastore.eu</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>