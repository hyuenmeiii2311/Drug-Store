<?php
class ProductMix
{
    function get_Data($limit = 0, $offset = 0)
    {
        $db = new Database();

        $limit = (int)$limit;
        $offset = (int)$offset;

        return $db->read("SELECT * FROM product_mix LIMIT " . $limit . " OFFSET " . $offset);
    }
    function get_All()
    {
        $db = new Database();

        return $db->read("SELECT * FROM product_mix ");
    }
    function count_Records()
    {
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM product_mix;");
        return $result[0]->total;
    }
}
