<?php
class Contact {
    function get_All($limit = 0,$offset = 0){
        $db = new Database();
        if ($limit != 0 && $offset != 0) {
        $limit = (int)$limit;
        $offset = (int)$offset;
        
        return $db->read("SELECT * FROM contact LIMIT ".$limit." OFFSET ".$offset);}
        else{
            return $db->read("SELECT * FROM contact ");
        }
    }
    function count_Records(){
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM contact;");
        return $result[0]->total;
    }
    
}