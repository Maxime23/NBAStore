<?php
function __autoload($nom_classe) {
    if (file_exists('include/classes/' . $nom_classe . '.class.php')) {
        require 'include/classes/' . $nom_classe . '.class.php';
    }
    
}
?> 