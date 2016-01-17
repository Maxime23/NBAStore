<?php

class commentaire {

    protected $_id_commentaire = -1;
    protected $_id_prod = 0;
    protected $_description = "";
    
    public function setAll($_id_commentaire, $_id_prod, $_description) {
        $this->_id_commentaire = $_id_commentaire;
        $this->_id_prod = $_id_prod;
        $this->_description = $_description;
    }

    public function setEdit($_id_commentaire, $_id_prod, $_description) {
        $this->_id_commentaire = $_id_commentaire;
        $this->_id_prod = $_id_prod;
        $this->_description = $_description;
    }

    public function toString() {
        return 'description['
                . ' $_id_prod= <b> ' . $this->get_id_prod() . '</b>'
                . ' $_id_id_commentaire= <b> ' . $this->get_id_commentaire() . '</b>'
                . ' $_description= <b>' . $this->get_description() . '</b>'
                . ']';
    }
//ID_produits
    public function get_id_prod() {
        return $this->_id_prod;
    }
    
    public function set_id_prod($_id_prod) {
        $this->_id_prod = $_id_prod;
    }
//ID_commentaire
    public function get_id_commentaire() {
        return $this->_id_commentaire;
    }
    public function set_id_commentaire($_id_commentaire) {
        $this->_id_commentaire = $_id_commentaire;
    }
//Description
    public function get_description() {
        return $this->_description;
    }
    public function set_description($_description) {
        $this->_description = $_description;
    }
}

?>