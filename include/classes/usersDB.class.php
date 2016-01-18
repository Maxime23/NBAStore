<?php

class UsersDB extends Users {

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }
// création d'un user 
    public function createUsers() {
        try {
            $query = "INSERT INTO users (nom, prenom, adresse, mdp, email, login)"
                    . "VALUES('". addslashes($this->get_nom()) . 
                                "', '" . addslashes($this->get_prenom()) . 
                                "', '" . addslashes($this->get_adresse()) . 
                                "', '" . addslashes(md5(md5(($this->get_mdp())))) .
                                "', '" . addslashes($this->get_email()) .
                                "', '" . addslashes($this->get_login()) . "')";
            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_users = $data["id_users"];
        }
    }

//Connexion on test si c'est les bon log
    
    public function connexion($emailTmp, $mdpTmp) {
        try {
            $query = "select * from users where email = '" . addslashes($emailTmp) . "' and mdp = '" . addslashes($mdpTmp) . "';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $ok = true;
            $this->_id_users = $data["id_users"];
            $this->_nom = utf8_encode($data["nom"]);
            $this->_prenom = utf8_encode($data["prenom"]);
            $this->_adresse = utf8_encode($data["adresse"]);
            $this->_mdp = utf8_encode($data["mdp"]);
            $this->_email = utf8_encode($data["email"]);
            $this->_login = utf8_encode($data["login"]);
        }
    }
// Modification d'un user
    public function update() {
        $ok = false;
        try {
            $query = "UPDATE users SET nom = '" . $this->get_nom() . "', prenom = '" . $this->get_prenom() . "', adresse = '" . $this->get_adresse() .  "'" . " WHERE id_users = " . $this->get_id_users();
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $ok = true;
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        return $ok;
    }
    
    //changer le mdp
    public function setPassword($var1, $var2) {
        $ok = false;
        try {
            $query = "UPDATE users SET mdp = '" . $var2 . "' WHERE id_users = " . $var1 . ";";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $ok = true;
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        return $ok;
    }
    
  // trouver un user sur son login  
        public function getUsersByLogin($var_login) {
        try {
            $query = "select * from users where login = '" . addslashes($var_login) . "';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_users = $data["id_users"];
            $this->_nom = utf8_encode($data["nom"]);
            $this->_prenom = utf8_encode($data["prenom"]);
            $this->_adresse = utf8_encode($data["adresse"]);
            $this->_mdp = utf8_encode($data["mdp"]);
            $this->_email = utf8_encode($data["email"]);
            $this->_login = utf8_encode($data["login"]);

        }
    }

}


?>