<?php
class Product
{
    function get_All($limit , $offset)
    {
        $db = new Database();

            $limit = (int)$limit;
            $offset = (int)$offset;
            
            return $db->read("SELECT * FROM product LIMIT " . $limit . " OFFSET " . $offset);

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
    function insert($POST,$FILES)
    {
        // show($POST);
        $db = new Database();
        $data = array();

        $data['name'] = trim($POST['name']);
        $data['name'] = trim($POST['name']);
        $data['weight'] = trim($POST['weight']);
        $data['unit'] = trim($POST['unit']);
        $data['price'] = trim($POST['price']);
        $data['quantity'] = trim($POST['quantity']);
        $data['category_id'] = trim($POST['category_id']);
        $data['brand_id'] = trim($POST['brand_id']);
        $data['description'] = trim($POST['description']);
        $data['image'] = trim($FILES['fileToUpload']['name']);

        $db = new Database();
        $query = "INSERT INTO `product`( `name`, `weight`, `unit`, `image`, `price`, `quantity`, `description`, `category_id`, `brand_id`)
         VALUES ('" . $data['name'] . "','".$data['weight']."','".$data['unit']."','".$data['image']."','".$data['price']."','".$data['quantity']."','".$data['description']."','".$data['category_id']."','".$data['brand_id']."')";
        $result = $db->write($query);

        if ($result) {
            header("Location:" . ROOT . "admin/product");
            die;
        }
    }
    function get_By_Id($id){
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT * FROM product WHERE id = $id");
        return $result[0];
    }
    function update($POST,$FILES){
        $data = array();

        $data['id'] = trim($POST['product_id']);
        $data['name'] = trim($POST['name']);
        $data['weight'] = trim($POST['weight']);
        $data['unit'] = trim($POST['unit']);
        $data['price'] = trim($POST['price']);
        $data['quantity'] = trim($POST['quantity']);
        $data['category_id'] = trim($POST['category_id']);
        $data['brand_id'] = trim($POST['brand_id']);
        $data['description'] = trim($POST['description']);
        $data['image'] = trim($FILES['fileToUpload']['name']);
        $data['old_image'] = trim($POST['old_image']);
        $data['test'] = $FILES;

        if($data['image'] == ''){
            $data['new_image'] =  $data['old_image'] ;
        }
        else{
            $data['new_image'] =  $data['image'] ;
        }
        
        $db = new Database();
        return  $db->write("UPDATE `product` SET `name`='".$data['name']."',`weight`='".$data['weight']."',`unit`='".$data['unit']."',`image`='".$data['new_image']."',`price`='".$data['price']."',`quantity`='".$data['quantity']."',`description`='".$data['description']."',`category_id`='".$data['category_id']."',`brand_id`='".$data['brand_id']."' WHERE `id`='".$data['id']."'");
    }
}
