 <?php

class commande {

    protected $_id_facture;
    protected $_id_users = 0;
    protected $_prix = 0;
    protected $_date= 0;
    protected $_id_prod = 0;
    protected $_etat;

    public function setAll($_id_users, $_prix, $_date, $_id_prod, $_etat) {
        
        $this->_id_users = $_id_users;
        $this->_prix = $_prix;
        $this->_date = $_date;
        $this->_id_prod = $_id_prod;
        $this->_etat = $_etat;
    }

    public function setEdit($_prix, $_date, $_etat) {
        $this->_prix = $_prix;
        $this->_date = $_date;
        $this->_etat = $_etat;
    }

//ID_prod
    public function get_id_prod() {
        return $this->_id_prod;
    }
    
    public function set_id_prod($_id_prod) {
        $this->_id_prod = $_id_prod;
    }
//ID_users
    public function get_id_users() {
        return $this->_id_users;
    }
    public function set_id_users($_id_users) {
        $this->_id_users = $_id_users;
    }
//Id_facture
    public function get_id_facture() {
        return $this->_id_facture;
    }
    public function set_id_facture($_id_facture) {
        $this->_id_facture = $_id_facture;
    }
//date
    public function get_date() {
        return $this->_date;
    }
    public function set_date($_date) {
        $this->_date = $_date;
    }
//prix
    public function get_prix() {
        return $this->_prix;
    }
    public function set_prix($_prix) {
        $this->_prix = $_prix;
    }
    
    public function get_etat() {
        return $this->_etat;
    }
    
    public function set_etat($_etat) {
        $this->_etat = $_etat;
    }

}

?>