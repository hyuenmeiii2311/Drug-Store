<?php
class Category {
    function get_All(){
        $db = new Database();
        return $db->read("SELECT category.id as id, category.name as name, product_mix.name as mix_name
        FROM `category` INNER JOIN product_mix on category.product_mix_id = product_mix.id;");
    }
    function get_Parent($id){
        $id = (int) $id;
        $db = new Database();
        return $db->read("SELECT * FROM category WHERE product_mix_id = '" .$id ."'");

    }
    function count_Records(){
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM category;");
        return $result[0]->total;
    }
}