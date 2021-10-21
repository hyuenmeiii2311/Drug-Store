<?php
class Contact {
    function get_All(){
        $db = new Database();
        return $db->read("SELECT * FROM contact");
    }
}