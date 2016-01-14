
</div>
<div class="large-12 columns">
    <div id="container-spacer"></div>
</div>
<!-- =================== FOOTER  =================== -->
<div class="large-12 columns">
    <div id="footer-reference" class="row">
        <div class="medium-8 column">
           Ce site a été réalisé dans le cadre du cours de programmation avancées web.    
        </div>
        <div id="medialink" class="medium-4 column">
            <a href="https://twitter.com/kwezanoya"><span class="fa fa-twitter"></span></a>
            <a href="http://facebook.com/maxime.stoclet"><span class="fa fa-facebook-square"></span></a>
            <a href="https://github.com/maxime2310"><span class="fa fa-github-square"></span></a>

        </div>
    </div>
</div>

<div id="myModal" class="reveal-modal remove-whitespace" data-reveal style="width: 800px;">
    <div class="row">
        <div class="large-6 columns auth-plain">
            <div class="signup-panel newusers">
                <p class="welcome"> Pas encore de compte?</p>
                <p>Tout les membres s'inscrivant avant le 31 janvier 2016 participeront à un tirage au sort afin de gagner un week-end de rêve sur la baie de Miami! </p><br>
                <a href="index.php?module=acces&action=inscription" class="button ">S'inscrire</a></br>
            </div>
        </div>
        <div class="large-6 columns auth-plain">
            <div class="signup-panel left-solid">
                <p class="welcome">Connexion</p>
                <form action="index.php?module=acces&action=connexion" method="post">
                    <div class="row collapse">
                        <div class="small-2  columns">
                            <span class="prefix"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="small-10  columns">
                            <input type="text" placeholder="login" name="login">
                        </div>
                    </div>
                    <div class="row collapse">
                        <div class="small-2 columns ">
                            <span class="prefix"><i class="fa fa-lock"></i></span>
                        </div>
                        <div class="small-10 columns ">
                            <input type="password" placeholder="password" name="password">
                        </div>
                    </div>
                    <input type="submit" class="button" value="Se connecter" />
                </form>
            </div>
        </div>

    </div>   
    <a class="close-reveal-modal">&#215;</a>
</div>             
<!-- script foundation -->
<script src="include/js/vendor/jquery.js"></script>
<script src="include/js/foundation.min.js"></script>
<script>
    $(document).foundation();
    $(document).ready(function() {
        $("#header-login").hover(function() {
            $("#header-login-menu").stop().slideDown();
        }, function() {
            $("#header-login-menu").stop().slideUp();
        });
    });
        
</script>
</body>
</html>
