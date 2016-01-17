<?php

if (isset($_GET["action"])) {
        if ($_GET["action"] == "prodassocie") {
            include('prodassocie.php');
        }
       else if ($_GET["action"] == "details") {
            include('details.php');
        }                else {
                include('container.php');
                }
    } else {
        include('container.php');
    }

?>