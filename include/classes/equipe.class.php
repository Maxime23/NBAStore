<?php

class Equipe {

    protected $_id_equipe = 0;
    protected $_nom_equipe = "";
    protected $_equipe_avatar = "";


    public function setAll($_nom_equipe, $_equipe_avatar) {
        $this->_nom_equipe = $_nom_equipe;
        $this->_equipe_avatar = $_equipe_avatar;
    }

    public function setEdit($_nom_equipe, $_equipe_avatar) {
        $this->_nom_equipe = $_nom_equipe;
        $this->_equipe_avatar = $_equipe_avatar;
    }

    public function toString() {
        return 'Equipe['
                . ' $_id_equipe= <b>' . $this->get_id_equipe() . '</b>'
                . ', $_nom_equipe= <b>' . $this->get_nom_equipe() . '</b>'
                . ', $_equipe_avatar= <b>' . $this->get_equipe_avatar() . '</b>'
                . ']';
    }
//ID_equipe
    public function get_id_equipe() {
        return $this->_id_equipe;
    }
    
    public function set_id_equipe($_id_equipe) {
        $this->_id_equipe = $_id_equipe;
    }
//Nom
    public function get_nom_equipe() {
        return $this->_nom_equipe;
    }
    public function set_nom_equipe($_nom_equipe) {
        $this->_nom_equipe = $_nom_equipe;
    }
//Avatar
    public function get_equipe_avatar() {
        return $this->_equipe_avatar;
    }
    public function set_equipe_avatar($_equipe_avatar) {
        $this->_equipe_avatar = $_equipe_avatar;
    }
}

?>