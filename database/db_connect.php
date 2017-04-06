<?php


class db_connect{
    private $localhost = "localhost";
    private $root = "root";
    private $password = "";
    private $db = "grupp16";
    public function database_connect(){
        $mysqli = new mysqli($this->localhost, $this->root, $this->password, $this->db);
        $mysqli->set_charset("utf8");
        
        return $mysqli;
    }
}