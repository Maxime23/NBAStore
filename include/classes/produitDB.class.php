<?php

class produitDB extends produit {

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }
    

// création d'un user 
    public function createProduits() {
        try {
            $query = "INSERT INTO produits (id_cat, id_equipe, nom, avatar_prod, prix)"
                    . "VALUES('". addslashes($this->get_id_cat()) . 
                                "', '" . addslashes($this->get_id_equipe()) . 
                                "', '" . addslashes($this->get_nom()) . 
                                "', '" . addslashes($this->get_avatar_prod()) . 
                                "', '" . addslashes($this->get_prix()) . "')";
            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_prod = $data["id_prod"];
        }

    }
    //Recup les produits lié a l'id d'une equipe
    
        public function getProduitsById($var) {
        try {
            $query = "select * from produits where id_prod = '" . addslashes($var) . "';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_prod = $data["id_prod"];
            $this->_nom = utf8_encode($data["nom"]);
            $this->_avatar_prod = $data["avatar_prod"];
            $this->_prix = $data["prix"];

        }
    }
    
        
        public function getProduitsPanier() {
        try {
            $query = "select * from produits where id_prod = '" . addslashes($var) . "';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_prod = $data["id_prod"];
            $this->_nom = utf8_encode($data["nom"]);
            $this->_avatar_prod = $data["avatar_prod"];
            $this->_prix = $data["prix"];

        }
    }
    
        
        public function compteProduits($var) {
        $total = 0;
        try {
            $queryCount = "select count(0) as total from produits where id_equipe = '" .addslashes($var) ."';";
            $resultset = $this->_db->prepare($queryCount);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $total = $data["total"];
        }
        return $total;
    }
    
        public function getProduits($compteProduits, $var) {
        $array = array();
        $i = 0;
        try {
            $query = "select id_prod, nom, avatar_prod, prix from produits where id_equipe = '" .addslashes($var) ."' order by id_prod;";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $array[$i]["id_prod"] = $data["id_prod"];
            $array[$i]["nom"] = utf8_encode($data["nom"]);
            $array[$i]["avatar_prod"] = $data["avatar_prod"];
            $array[$i]["prix"] = $data["prix"];
            $i++;
        }
        return $array;
    }
    
            public function ChopeProduits() {
        $array = array();
        $i = 0;
        try {
            $query = "select * from produits where id_equipe = '" .addslashes($var) ."' order by id_prod;";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $array[$i]["id_prod"] = $data["id_prod"];
            $array[$i]["nom"] = utf8_encode($data["nom"]);
            $array[$i]["avatar_prod"] = $data["avatar_prod"];
            $array[$i]["prix"] = $data["prix"];
            $i++;
        }
        return $array;
    }

    public function compteShoes() {
        $total = 0;
        $var = 2;
        try {
            $queryCount = "select count(0) as total from produits where id_cat = '" .addslashes($var) ."';";
            $resultset = $this->_db->prepare($queryCount);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $total = $data["total"];
        }
        return $total;
    }
    
        public function getShoes($compteShoes) {
        $array = array();
        $var = 2;
        $i = 0;
        try {
            $query = "select id_prod, nom, avatar_prod, prix from produits where id_cat = '" .addslashes($var) ."' order by id_prod;";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $array[$i]["id_prod"] = $data["id_prod"];
            $array[$i]["nom"] = utf8_encode($data["nom"]);
            $array[$i]["avatar_prod"] = $data["avatar_prod"];
            $array[$i]["prix"] = $data["prix"];
            $i++;
        }
        return $array;
    }

}
?>