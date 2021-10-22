<?php
class Product
{
    function get_All($limit = 0, $offset = 0)
    {
        $db = new Database();
        if ($limit != 0 && $offset != 0) {
            $limit = (int)$limit;
            $offset = (int)$offset;
            
            return $db->read("SELECT * FROM product LIMIT " . $limit . " OFFSET " . $offset);
        } else {
            return $db->read("SELECT * FROM product ");
        }
    }
    function search($keyword, $limit, $offset)
    {
        $db = new Database();
        return $db->read("SELECT product.* 
        FROM product INNER JOIN category on product.category_id = category.id
        WHERE product.name LIKE '%" . $keyword . "%' OR category.name LIKE '%" . $keyword . "%' LIMIT $limit OFFSET $offset ");
    }
    function get_By_BrandId($id, $limit, $offset)
    {
        $id = (int)$id;
        $db = new Database();
        return $db->read("SELECT * FROM product WHERE brand_id = '$id' LIMIT $limit OFFSET $offset");
    }
    function get_By_CategoryId($id, $limit, $offset)
    {
        $id = (int)$id;
        $db = new Database();
        return $db->read("SELECT * FROM product WHERE category_id = '$id' LIMIT $limit OFFSET $offset");
    }
    function get_By_ProductMixId($id, $limit, $offset)
    {
        $id = (int)$id;
        $db = new Database();
        return $db->read("SELECT product.* 
        FROM product INNER JOIN category on product.category_id = category.id 
        INNER JOIN product_mix on category.product_mix_id = product_mix.id 
        WHERE product_mix.id = '$id' LIMIT $limit OFFSET $offset");
    }
    function count_Records()
    {
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM product;");
        return $result[0]->total;
    }
    function filter_Price($from, $to)
    {
        $db = new Database();
        return $db->read("SELECT * FROM product WHERE price BETWEEN $from AND $to;");
    }
    function filter_Price_ASC($from, $to)
    {
        $db = new Database();
        return $db->read("SELECT * FROM product ORDER BY price ASC;");
    }
    function filter_Price_DESC($from, $to)
    {
        $db = new Database();
        return $db->read("SELECT * FROM product ORDER BY price DESC;");
    }
    function filter_Name_ASC($from, $to)
    {
        $db = new Database();
        return $db->read("SELECT * FROM product ORDER BY name ASC;");
    }
    function filter_Name_DESC($from, $to)
    {
        $db = new Database();
        return $db->read("SELECT * FROM product ORDER BY name DESC;");
    }
}
