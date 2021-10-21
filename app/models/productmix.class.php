<?php
class ProductMix {
    function get_All(){
        $db = new Database();
        return $db->read("SELECT * FROM product_mix");
    }
}