<?php
//singleton : à tout moment , un seul ovbjet ne peut exister
class Connexion {
    private static $_instance = null;

    public static function getInstance($dsn, $user, $pass) {
        // :: = appel à une var ou fct statique  

        if (!self::$_instance) {
            try {
                self::$_instance = new PDO($dsn, $user, $pass);
                //definition du mode d'erreur ( des warnings par exemple )
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //connexion réussis si aucun message d'erreur
                
            } catch (PDOException $e) {
                $_SESSION["id_erreur"] = 40000;
                $_SESSION["erreur_message"] = "Erreur de connexion : ".utf8_encode($e->getMessage());
            }
        }
        return self::$_instance;
    }
    
}
?>