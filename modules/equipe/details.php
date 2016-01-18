<?php
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    //Ici c'est plutot dans le cas ou on change l'id manuellement dans l'url
    $_SESSION["id_erreur"] = 404;
    $_SESSION["erreur_message"] = "La page que vous avez demandée n’a pas été trouvée.<br />Il se peut que le lien que vous avez utilisé soit rompu ou que vous ayez tapé l’adresse (URL) incorrectement.";
    include("modules/erreur/init.php");
} else {
    //si on trouve pas l'user on affiche un message d'erreur
    $ProduitToGet = new produitDB($db);
    $ProduitToGet->getProduitsById($_GET["id"]);
    $CommentaireToGet = new commentaireDB($db);
    $CommentaireToGet->getCommentaireById($_GET["id"]);
    if ($ProduitToGet->get_id_prod() == 0) {
        $_SESSION["id_erreur"] = 500;
        $_SESSION["erreur_message"] = "Aucun produits avec l'identifiant <i class=\"fa fa-angle-double-left\"></i> " . $_GET["id"] . " <i class=\"fa fa-angle-double-right\"></i> n'a pu être trouvé.";
        include("modules/erreur/init.php");
    } else {
        //si pas on affiche ismplement ses coordonnées
        ?>
        <div class="row" id="profil">
            <div class="medium-3 columns">
                <div id="profil-avatar" class="text-center">
                    <img src="<?php echo $ProduitToGet->get_avatar_prod(); ?>" />
                    <br /><br /><?php echo $ProduitToGet->get_nom(); ?>
                </div>
            </div>
            <div class="medium-9 columns">
                <div class="profil-header">
                    Informations du produits
                </div>
                <div class="profil-content">
                    <div class="row">
                        <div class="medium-12 columns">
                            <table class="table-clear w-max table-profil">
                                <tr>
                                    <td style="width: 30%;"><b>Prix :</b></td>
                                    <td><?php echo number_format($ProduitToGet->get_prix(), 2, ',', ' '); ?> €</td>
                                </tr>
                                <tr>
                                    <td><b>Description :</b></td>
                                    <td><?php echo $CommentaireToGet->get_description(); ?></td>
                                </tr>
                                </table>
                        </div>
                        </div>
                    </div>
                <a class="btn-panier" href ="index.php?module=commande&action=addcommande&id=<?php echo $ProduitToGet->get_id_prod(); ?>"><span class="fa fa-shopping-cart"></span> Commander !</button></a>
                </div>
            </div>
        <?php
    }
}
?>