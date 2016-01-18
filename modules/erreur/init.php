<div class="row" id="erreur-container">
        <img src="img/mcgee.jpg" alt="WAT"/><br />

        <h1 style="color:#000000;">Oups! </h1>
        <h5 style="color:#7497b8;"><?php if(isset($_SESSION["id_erreur"]) && !empty($_SESSION["id_erreur"])){echo "Erreur : ".$_SESSION["id_erreur"]."<br />".$_SESSION["erreur_message"];}else{echo "Erreur inconnu";};?></h5>
</div>

<?php
$_SESSION["id_erreur"] = "";
$_SESSION["erreur_message"] = "";