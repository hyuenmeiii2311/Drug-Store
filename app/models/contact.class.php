<?php
class Contact {
    function get_All(){
        $db = new Database();
        return $db->read("SELECT * FROM contact");
    }
    function count_Records(){
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM contact;");
        return $result[0]->total;
    }
    
}