<?php
//un seul objet peut exister a la fois
class Connexion {
    private static $_instance = null;

    public static function getInstance($dsn, $user, $pass) {
       

        if (!self::$_instance) {
            try {
                self::$_instance = new PDO($dsn, $user, $pass);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // La connexion a fonctionné si on a pas le message d'erreur
                
            } catch (PDOException $e) {
                $_SESSION["id_erreur"] = 40000;
                $_SESSION["erreur_message"] = "Erreur de connexion : ".utf8_encode($e->getMessage());
            }
        }
        return self::$_instance;
    }
}
?>