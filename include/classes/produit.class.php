<?php

class produit {

    protected $_id_prod = 0;
    protected $_id_cat = 0;
    protected $_id_equipe = 0;
    protected $_nom = "";
    protected $_avatar_prod = "";
    protected $_prix = 0;

    public function setAll($_id_cat, $_id_equipe, $_nom, $_avatar_prod, $_prix) {
        $this->_id_cat = $_id_cat;
        $this->_id_equipe = $_id_equipe;
        $this->_nom_prod = $_nom_prod;
        $this->_avatar_prod = $_avatar_prod;
        $this->_prix = $_prix;
    }

    public function setEdit($_nom, $_avatar_prod, $_prix) {
        $this->_nom_prod = $_nom;
        $this->_avatar_prod = $_avatar_prod;
        $this->_prix = $_prix;
    }

    public function toString() {
        return 'produit['
                . ' $_id_prod= <b> ' . $this->get_id_prod() . '</b>'
                . ' $_id_cat= <b> ' . $this->get_id_cat() . '</b>'
                . ' $_id_equipe= <b>' . $this->get_id_equipe() . '</b>'
                . ', $_nom= <b>' . $this->get_nom() . '</b>'
                . ', $_avatar_prod= <b>' . $this->get_avatar_prod() . '</b>'
                . ', $_prix= <b>' . $this->get_prix() . '</b>'
                . ']';
    }
//ID_produits
    public function get_id_prod() {
        return $this->_id_prod;
    }
    
    public function set_id_prod($_id_prod) {
        $this->_id_prod = $_id_prod;
    }
//ID_cat
    public function get_id_cat() {
        return $this->_id_cat;
    }
    public function set_id_cat($_id_cat) {
        $this->_id_cat = $_id_cat;
    }
//Id_equipe
    public function get_id_equipe() {
        return $this->_id_equipe;
    }
    public function set_id_equipe($_id_equipe) {
        $this->_id_equipe = $_id_equipe;
    }
//nom_prod
    public function get_nom() {
        return $this->_nom;
    }
    public function set_nom($_nom) {
        $this->_nom = $_nom;
    }
//avatar_prod
    public function get_avatar_prod() {
        return $this->_avatar_prod;
    }
    public function set_avatar_prod($_avatar_prod) {
        $this->_avatar_prod = $_avatar_prod;
    }
//prix
    public function get_prix() {
        return $this->_prix;
    }
    public function set_prix($_prix) {
        $this->_prix = $_prix;
    }

}

?>