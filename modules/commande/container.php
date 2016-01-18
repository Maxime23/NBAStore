<?php
$tmp = new commandeDB($db);
$compteCommandeF = $tmp->compteCommandeF($_SESSION["id_user"]);
$b = 0;
$arrayCmd = array();
$arrayCmd = $tmp->getCommandeF($compteCommandeF);
$compteCommandeE = $tmp->compteCommandeE($_SESSION["id_user"]);
$arrayCommande = array();
//var_dump($_SESSION["id_user"]);
$arrayCommande = $tmp->getCommandeE($compteCommandeE);
if ($compteCommandeF > 0) {
?>
    <div class="row" id="equipe">
        <div class="medium-12">
            <center><h3>Vos commandes terminées (<?php echo $compteCommandeF ?>)</h3></center>
        </div>
    </div>
    <div class="row" id="equipe">
        <table class="table-clear w-max list-equipe"  cellspacing="0">
            <?php
            $a = 0;
    echo ('<tr>');
            for($i=0;$i<$compteCommandeF;$i++){

                ?>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Commande numéro : <?php echo $arrayCmd[$i]["id_facture"]; ?></b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Date :<?php echo date('d/m/Y à H:i', $arrayCmd[$i]["date"]);?></b>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Montant à payer : <?php echo number_format($arrayCmd[$i]["prix"], 2, ',', ' ');  ?>€</b>                    
                </td>                
           </tr> 
        <?php
            }
    ?>
        </table>

    </div>

    <?php
        $i=0;
}
if ($compteCommandeE > 0) {
?>
    <div class="row" id="equipe">
        <div class="medium-12">
            <center><h3>Vos commandes en cours (<?php echo $compteCommandeE ?>)</h3></center>
        </div>
    </div>
    <div class="row" id="equipe">
        <table class="table-clear w-max list-equipe"  cellspacing="0">
            <?php
            $a = 0;
    echo ('<tr>');
            for($i=0;$i<$compteCommandeE;$i++){

                ?>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Commande numéro : <?php echo $arrayCommande[$i]["id_facture"]; ?></b>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Date : <?php echo date('d/m/Y à H:i', $arrayCommande[$i]["date"]); ?></b>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Montant à payer : <?php echo number_format($arrayCommande[$i]["prix"], 2, ',', ' ');  ?>€</b>                    
                </td>                
           </tr> 
        <?php
            }
                           
    ?>
        </table>

    </div>

    <?php
}
if ($compteCommandeE + $compteCommandeF == 0) {
    ?>
    <div class="row" id="equipe">
        <div class="panel">
            <h5>Aucune facture.</h5>
            <p>Vous n'avez pas encore commander sur notre site...</p>
        </div>
    </div>
    <?php
}

?>

