<?php

class commentaireDB extends commentaire {

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }
// création d'un commentaire 
    public function createCommentaire() {
        try {
            $query = "INSERT INTO commentaire (id_commentaire, id_prod, description)"
                    . "VALUES('". addslashes($this->get_id_commentaire()) . 
                                "', '" . addslashes($this->get_id_prod()) . 
                                "', '" . addslashes($this->get_description()) . "')";
            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_commentaire = $data["id_commentaire"];
        }
        
    }
    //Recup la description lié a un l'id d'un produit
    
        public function getCommentaireById($var) {
        try {
            $query = "select id_commentaire, id_prod, description from commentaire where id_prod = '" . addslashes($var) . "';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_prod = $data["id_prod"];
            $this->_id_commentaire = $data["id_commentaire"];
            $this->_description = utf8_encode($data["description"]);

        }
    }
    
        
       
}
?>