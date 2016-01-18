 <?php

class commandeDB extends commande {

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }
    
    
    
// création d'une commande
    public function createCmd() {
        try {
            $query = "INSERT INTO facture (id_users, prix, date, id_prod, etat)"
                    . "VALUES('" . addslashes($this->get_id_users()) . 
                                "', '" . addslashes($this->get_prix()) . 
                                "', '" . addslashes($this->get_date()) . 
                                "', '" . addslashes($this->get_id_prod()) .
                                "', '" . addslashes($this->get_etat()) . "')";
            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_facture = $data["id_facture"];
            $this->_id_users = $data["id_users"];
            $this->_prix = $data["prix"];
            $this->_date = $data["date"];
            $this->_id_prod = $data["id_prod"];
            
        }

    }
        public function compteCommandeF($var) {
        $total = 0;
        try {
            $queryCount = "select count(0) as total from facture where etat = 1 and id_users = '" . addslashes($var) . "';";
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
    
        public function compteCommandeE($var) {
        $total = 0;
        try {
            $queryCount = "select count(0) as total from facture where etat = 0 and id_users ='" . addslashes($var) . "';";
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
    
        public function getCommandeE($compteCommandeE) {
        $array = array();
        $i = 0;
        try {
            $query = "select * from facture where etat = 0 order by id_facture;";

   
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $array[$i]["id_facture"] = $data["id_facture"];
            $array[$i]["id_users"] = $data["id_users"];
            $array[$i]["prix"] = $data["prix"];
            $array[$i]["date"] = $data["date"];
            $array[$i]["id_prod"] = $data["id_prod"];
            $i++;
        }
        return $array;
    }

            public function getCommandeF($compteCommandeF) {
        $array = array();
        $i = 0;
        try {
            $query = "select * from facture where etat = 1 order by id_facture;";

   
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $array[$i]["id_facture"] = $data["id_facture"];
            $array[$i]["id_users"] = $data["id_users"];
            $array[$i]["prix"] = $data["prix"];
            $array[$i]["date"] = $data["date"];
            $array[$i]["id_prod"] = $data["id_prod"];
            $i++;
        }
        return $array;
    }

}
?>