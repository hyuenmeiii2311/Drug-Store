<?php
class Brand {
    function get_All(){
        $db = new Database();
        return $db->read("SELECT * FROM brand");
    }
}