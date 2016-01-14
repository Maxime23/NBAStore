<?php

class EquipeDB extends equipe {

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }
// création d'un user 
    public function createEquipe() {
        try {
            $query = "INSERT INTO equipe (nom_equipe, equipe_avatar)"
                    . "VALUES('". addslashes($this->get_nom_equipe()) . 
                                "', '" . addslashes($this->get_equipe_avatar()) . "')";
            
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_equipe = $data["id_equipe"];
        }
    }
    
    // Modification d'une equipe
    public function update() {
        $ok = false;
        try {
            $query = "UPDATE equipe SET nom_equipe = '" . $this->get_nom_equipe() . "', equipe_avatar = '" . $this->get_equipe_avatar();
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $ok = true;
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        return $ok;
    }
    
        public function getEquipeById($id) {
        try {
            $query = "select * from equipe where id_equipe = " . $id . ";";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_equipe = $data["id_equipe"];
            $this->_equipe_avatar = utf8_encode($data["equipe_avatar"]);

        }
    }
    
        public function getEquipeAll() {
        try {
            $query = "select nom_equipe, equipe_avatar from equipe;";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_nom_equipe = $data["nom_equipe"];
            $this->_equipe_avatar = $data["equipe_avatar"];
        }
    }
    
        public function compteEquipe() {
        $total = 0;
        try {
            $queryCount = "select count(0) as total from users;";
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
    
        public function getEquipe($compteEquipe) {
        $array = array();
        $i = 0;
        try {
            $query = "select nom_equipe, equipe_avatar from equipe order by id_equipe;";

            //$query = "select * from users order by login asc LIMIT " . $xParPage . " OFFSET " . $xDebut . "";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $array[$i]["nom_equipe"] = utf8_encode($data["nom_equipe"]);
            $array[$i]["equipe_avatar"] = $data["equipe_avatar"];
            $i++;
        }
        return $array;
    }

        public function getEquipeByNom($var) {
        try {
            $query = "select * from equipe where nom_equipe = '" . addslashes($var) . "';";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requete " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $this->_id_equipe = $data["id_equipe"];
            $this->_nom_equipe = utf8_encode($data["nom_equipe"]);
            $this->_equipe_avatar = utf8_encode($data["equipe_avatar"]);

        }
    }

}
?>