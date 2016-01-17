<?php
$tmp = new produitDB($db);
$compteProduits = $tmp->compteProduits($_GET["id"]);
$b = 0;
$arrayProd = array();
$arrayProd = $tmp->getProduits($compteProduits, $_GET["id"]);
if ($compteProduits > 0) {
    ?>

    <div class="row" id="equipe">
        <table class="table-clear w-max list-equipe"  cellspacing="0">
            <?php
            
    echo ('<tr>');
    $a=0;
            while ($b < $compteProduits){
                if($a == 4){
                    echo('</tr>');
                    echo('<tr>');
                    echo('<td>');
                    echo('</td>');
                    echo('<tr>');
                    $a=0;
                }
                ?>
                <td>
                <a style="font-size: 18px;" href="index.php?module=equipe&action=details&id=<?php echo $arrayProd[$b]["id_prod"]; ?>"><?php echo $arrayProd[$b]["nom"]; ?><img src="<?php echo $arrayProd[$b]["avatar_prod"]; ?>" alt="avatar du produit" /></a>                       
                </td>
                <?php
                
                    $b++;
                    $a++;
            
            }
            ?>
        </table>

    </div>

    <?php
} else {
    ?>
    <div class="row" id="equipe">
            <h2>Aucun produit...</h2>
            <p>Si ce message apparait c'est qu'il y a certainement un problème avec notre base de données ou que le produit n'existe pas !</p>
        
    </div>
    <?php
}
?>