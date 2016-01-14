<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>NBAStore Eu</title>
        <link rel="stylesheet" href="include/css/foundation.css" />
        <link rel="stylesheet" href="include/css/mine.css" />
        <link rel="stylesheet" href="include/css/font-awesome.css" />
        <link rel="stylesheet" href="include/google-code-prettify/prettify.css" />
        <script src="include/js/vendor/modernizr.js"></script>
        <script src="include/js/jquery-1.11.1.min.js"></script>
        <script src="include/google-code-prettify/run_prettify.js"></script>
        <link rel="icon" type="image/png" href="img/nba.png"/>
    </head>
    <body>
        <div id="site" class="row">
            <div class="large-12 columns" style="padding-top:40px;padding-bottom: 20px">
                <img src="img/nbastoreee.jpg" alt="NBA STORE"/>
            </div>
            <!-- =================== MENU  =================== -->
            <div class="large-12 columns">
                <table id="menu" class="table-clear w-max" style="" cellspacing="0">
                    <tr>
                        <td class="header-border-menu" onclick="location.href = 'index.php?module=accueil'"><span class="fa fa-home"></span> Accueil</td>
                        <td class="header-border-menu" onclick="location.href = 'index.php?module=equipe'">Equipes</td>
                        <td class="header-border-menu" onclick="location.href = 'index.php?module=shoes'">Chaussures</td>
                        <td class="header-border-menu" onclick="location.href = 'index.php?module=player'">Joueurs</td
                        <td class="header-border-menu-spacer"><!-- spacer --></td>
                         <td class="header-border-menu" onclick="location.href = 'index.php?module=contact'"> Contact</td>
                        <?php
                        if (isset($_SESSION["id_user"])) {
                            ?>
                            <td id="header-login" class="header-border-menu" >
                                <span onclick="location.href = 'index.php?module=membre&action=profil_users&id=<?php echo $_SESSION["login"]; ?>'"><span class="fa fa-user"></span> <?php echo $_SESSION["login"]; ?></span>
                                <div id="header-login-menu">
                                    <div class="profil-menu" onclick="location.href = 'index.php?module=membre&action=profil_users&id=<?php echo $_SESSION["login"] ?>'">
                                        <i class="fa fa-user"></i> Profil
                                    </div>
                                    <div class="profil-menu" onclick="location.href = 'index.php?module=membre&action=update'">
                                        <i class="fa fa-refresh"></i> Mise a jour du profil
                                    </div>
                                    <div class="profil-menu-logout" onclick="location.href = 'index.php?action=logout'">
                                        <i class="fa fa-sign-out" style="color:#C0392B;"></i> Deconnexion
                                    </div>
                                </div>
                            </td>
                            <?php
                        } else {
                            ?>
                            <td class="header-border-menu" data-reveal-id="myModal"><span class="fa fa-user"></span> Login</td>
                            <?php
                        }
                        ?>
                    </tr>
                </table>
            </div>
            
            <div class="large-12 columns">
                <div id="alerteSVP">
                    <span class="fa fa-bell-o" style="font-size: 1.5em;"></span>
                    <span style="color:#243d54"><b>Attention, ce site est encore en développemment. Si vous voyez un problème, ne vous inquiétez pas. C'est normal !</b></span>
                </div>
            </div>
    <div class="large-12 columns">