<?php
require 'include/classes/commande.class.php';
require 'include/classes/commandeDB.class.php';
require 'include/classes/produit.class.php';
require 'include/classes/produitDB.class.php';
$erreur = 0;
$commande = false;
$erreurTab = array();
if (!isset($_GET["id"]) || empty($_GET["id"]) || !isset($_SESSION["id_user"]) || empty($_SESSION["id_user"])) {
    $_SESSION["id_erreur"] = 404;
    $_SESSION["erreur_message"] = "La page que vous avez demandée n’a pas été trouvée.<br />Il se peut que le lien que vous avez utilisé soit rompu ou que vous ayez tapé l’adresse (URL) incorrectement.";
    include("modules/erreur/init.php");
} else {
    //var_dump($_GET["id_prod"]);
    if ($erreur == 0) {
    //Si il y a pas d'erreur et que tout les champs sont rempli on les envoi a la bd avec la methode setAll qui est dans users.class.php et on met la variable $inscrpiton a true
        // var_dump($_GET["id"]);
         //var_dump($_SESSION["id_user"]);
         $ProduitToRegister = new produitDB($db);
         $ProduitToRegister->getProduitsById($_GET["id"]);
         $etat=0;
        // var_dump($ProduitToRegister->get_prix());

    
        $commande = new commandeDB($db);
        $commande->setAll($_SESSION["id_user"], $ProduitToRegister->get_prix(), time(), $_GET["id"], $etat);
        $commande->createCmd();
        $commande = true;
        if ($commande) { 
?>
            <div class="row" id="equipe">
                <div id="alert-cmd-reussie" data-alert class="alert-box success">Votre commande a été prise en compte<a href="#" class="close">&times;</a></div>
        <div class="panel text-center">
            <?php echo('Continuez vos achats ! <a href="javascript:history.back()">Cliquez ici</a> pour revenir à la page précédente...'); ?>
            
        </div>
    </div>
<script>
 $("#alert-cmd-reussie").slideDown("slow").delay(3000).slideUp("slow");
</script>
<?php
    }
}
}
?>