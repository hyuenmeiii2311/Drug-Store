<?php
class Brand {
    function get_All(){
        $db = new Database();
        return $db->read("SELECT * FROM brand");
    }
    function count_Records(){
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM brand;");
        return $result[0]->total;
    }
}