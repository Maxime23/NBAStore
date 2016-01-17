<?php
$tmp = new EquipeDB($db);
$compteEquipe = $tmp->compteEquipe();
$b = 0;
$arrayEquipe = array();
$arrayEquipe = $tmp->getEquipe($compteEquipe);
if ($compteEquipe > 0) {
    ?>

    <div class="row" id="equipe">
        <table class="table-clear w-max list-equipe"  cellspacing="0">
            <?php
            $a = 0;
    echo ('<tr>');
            while ($b <= 29){
               if($a == 5){
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
                <a style="font-size: 18px;" href="index.php?module=equipe&action=prodassocie&id=<?php echo $arrayEquipe[$b]["id_equipe"]; ?>"><?php echo $arrayEquipe[$b]["nom_equipe"]; ?><img src="<?php echo $arrayEquipe[$b]["equipe_avatar"]; ?>" alt="titre" /></a>                        
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
    <div class="row" id="categorie">
        <div class="panel">
            <h5>Aucune equipe.</h5>
            <p>Si ce message apparait c'est qu'il y a certainement un problème avec notre base de donnée.</p>
        </div>
    </div>
    <?php
}
?>

