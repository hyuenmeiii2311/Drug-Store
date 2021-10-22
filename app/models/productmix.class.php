<?php
class ProductMix
{
    function get_All($limit = 0, $offset = 0)
    {
        $db = new Database();
        if ($limit != 0 && $offset != 0) {
            $limit = (int)$limit;
            $offset = (int)$offset;

            return $db->read("SELECT * FROM product_mix LIMIT " . $limit . " OFFSET " . $offset);
        } else {
            return $db->read("SELECT * FROM product_mix ");
        }
    }
    function count_Records()
    {
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM product_mix;");
        return $result[0]->total;
    }
}
