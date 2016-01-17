<?php
$tmp = new produitDB($db);
$compteShoes = $tmp->compteShoes();
$b = 0;
$arrayShoes = array();
$arrayShoes = $tmp->getShoes($compteShoes);
if ($compteShoes > 0) {
    ?>

    <div class="row" id="equipe">
        <table class="table-clear w-max list-equipe textcenter"  cellspacing="0">
            <?php
            $a = 0;
    echo ('<tr>');
            while ($b < $compteShoes){
               if($a == 4){
                    
                    echo('</tr>');
                    echo('<tr>');
                    echo('<td>');
                    echo('</td>');
                    echo('<tr>');
                    $a=0;
                }
                else
            {
                ?>
                <td>
                    <a style="font-size: 18px;" href="index.php?module=equipe&action=details&id=<?php echo $arrayShoes[$b]["id_prod"]; ?>"><img src="<?php echo $arrayShoes[$b]["avatar_prod"]; ?>" alt="titre" /></a>   <br /><b><?php echo $arrayShoes[$b]["nom"]; ?></b>
                </td>
                <?php
                    $a++;
                    $b++;
            }
            }
            ?>
        </table>

    </div>

    <?php
} else {
    ?>
    <div class="row" id="equipe">
        <div class="panel">
            <h5>Aucune equipe.</h5>
            <p>Si ce message apparait c'est qu'il y a certainement un problème avec notre base de donnée.</p>
        </div>
    </div>
    <?php
}
?>

