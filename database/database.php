<?php

include_once 'db_connect.php';
class database{
    private $con;
    private $result = array();

    public function getAllMembers(){
        $this->con = new db_connect();
        $con = $this->con->database_connect();

        $da = $con->prepare("SELECT * FROM kaaslased");
        $da->execute();
        $loadData = $da->get_result();
        while ($data = $loadData->fetch_array()){
            $this->result[] = $data;
        }
        $da->close();
        $con->close();
        return $this->result;
    }

    public function searchMember($input){
        $getVal = $input.'%';
        $this->con = new db_connect();
        $con = $this->con->database_connect();
        $da = $con->prepare("SELECT * FROM kaaslased WHERE Eesnimi LIKE ? OR Perenimi LIKE ?");
        $da->bind_param("ss", $getVal, $getVal);
        $da->execute();
        $loadData = $da->get_result();
        while ($data = $loadData->fetch_array()){
            $this->result[] = $data;
        }
        $da->close();
        $con->close();
        return $this->result;
    }
    public function insertMember($name,$lastName,$date,$month,$year){
        $setDate = $year.'-'.$month.'-'.$date;
        $this->con = new db_connect();
        $con = $this->con->database_connect();
        $da = $con->prepare("INSERT INTO kaaslased(Eesnimi, Perenimi, Synniaasta) VALUES(?, ?, ?) ");
        $da->bind_param("sss", $name,$lastName,$setDate);
        $da->execute();
        $da->close();
        $con->close();
    }

    public function deleteMember($id){
        $this->con = new db_connect();
        $con = $this->con->database_connect();
        $da = $con->prepare("DELETE FROM kaaslased WHERE ID=? ");
        $da->bind_param("s", $id);
        $da->execute();
        $da->close();
        $con->close();
    }
}
