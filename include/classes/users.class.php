<?php

class Users {

    protected $_id_users = -1;
    protected $_nom = "";
    protected $_prenom = "";
    protected $_adresse = "";
    protected $_mdp = "";
    protected $_email = "";
    protected $_login = "";

    public function setAll($_nom, $_prenom, $_adresse, $_mdp, $_email, $_login) {
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_adresse = $_adresse;
        $this->_mdp = $_mdp;
        $this->_email = $_email;
        $this->_login = $_login;

    }

    public function setEdit($_id_users, $_nom, $_prenom, $_adresse, $_email) {
        $this->_id_users = $_id_users;
        $this->_nom = $_nom;
        $this->_prenom = $_prenom;
        $this->_adresse = $_adresse;
        $this->_email = $_email;
    }

    public function toString() {
        return 'Users['
                . '  $_id_users= <b>' . $this->get_id_users() . '</b>'
                . ', $_nom= <b>' . $this->get_nom() . '</b>'
                . ', $_prenom= <b>' . $this->get_prenom() . '</b>'
                . ', $_adresse= <b>' . $this->get_adresse() . '</b>'
                . ', $_mdp= <b>' . $this->get_mdp() . '</b>'
                . ', $_email= <b>' . $this->get_email() . '</b>'
                . ', $_login=<b>' . $this->get_login() . '</b>'

  
                . ']';
    }
//ID_user
    public function get_id_users() {
        return $this->_id_users;
    }
    
    public function set_id_users($_id_users) {
        $this->_id_users = $_id_users;
    }
//Mdp

    public function get_mdp() {
        return $this->_mdp;
    }

    public function set_mdp($_mdp) {
        $this->_mdp = $_mdp;
    }
//Email
    public function get_email() {
        return $this->_email;
    }
    
    public function set_email($_email) {
        $this->_email = $_email;
    }

//Nom
    public function get_nom() {
        return $this->_nom;
    }
    public function set_nom($_nom) {
        $this->_nom = $_nom;
    }
//Prénom
    public function get_prenom() {
        return $this->_prenom;
    }
    public function set_prenom($_prenom) {
        $this->_prenom = $_prenom;
    }
// Adresse
    public function get_adresse() {
        return $this->_adresse;
    }
    
    public function set_adresse($_adresse) {
        $this->_adresse = $_adresse;
    }
//Login
    public function get_login() {
        return $this->_login;
    }
    
    public function set_login($_login){
        $this->_login = $_login;
    }
}

?>