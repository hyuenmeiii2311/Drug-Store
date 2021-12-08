<?php
class Product
{
    function get_All($limit, $offset)
    {
        $db = new Database();
        $limit = (int)$limit;
        $offset = (int)$offset;
        return $db->read("SELECT * FROM product LIMIT " . $limit . " OFFSET " . $offset);
    }
    function get_Products_By_Id($ids_str)
    {
        $db = new Database();
        return $db->read("select * from product where id in ($ids_str)");
    }
    function search($keyword, $limit, $offset)
    {
        $db = new Database();
        return $db->read("SELECT product.* 
        FROM product INNER JOIN category on product.category_id = category.id
        WHERE product.name LIKE '%" . $keyword . "%' OR category.name LIKE '%" . $keyword . "%' LIMIT $limit OFFSET $offset ");
    }
    function get_By_BrandId($id, $limit, $offset, $action = '')
    {
        $id = (int)$id;
        $db = new Database();
        $query = "SELECT * FROM product WHERE brand_id = '$id' LIMIT $limit OFFSET $offset ";
        return $db->read($query);
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
    function get_Product($id){
        $id = (int)$id;
        $db = new Database();
        return $db->read("select * from product where id = $id limit 1;");
    }
    function insert($POST, $FILES)
    {
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
         VALUES ('" . $data['name'] . "','" . $data['weight'] . "','" . $data['unit'] . "','" . $data['image'] . "','" . $data['price'] . "','" . $data['quantity'] . "','" . $data['description'] . "','" . $data['category_id'] . "','" . $data['brand_id'] . "')";
        return $db->write($query);
    }
    function get_By_Id($id)
    {
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT * FROM product WHERE id = $id");
        return $result[0];
    }

    function get_Related_Products($category_id, $id){
        $db = new Database();
        $query = "SELECT product.id, product.name, product.image"
        ." FROM product INNER JOIN category on product.category_id = category.id "
        ." where product.category_id = ".$category_id." and product.id != ".$id." LIMIT 5;";
        return $db->read($query);
    }

    function update($POST, $FILES)
    {
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

        if ($data['image'] == '') {
            $data['new_image'] =  $data['old_image'];
        } else {
            $data['new_image'] =  $data['image'];
        }

        $db = new Database();
        return  $db->write("UPDATE `product` SET `name`='" . $data['name'] . "',`weight`='" . $data['weight'] . "',`unit`='" . $data['unit'] . "',`image`='" . $data['new_image'] . "',`price`='" . $data['price'] . "',`quantity`='" . $data['quantity'] . "',`description`='" . $data['description'] . "',`category_id`='" . $data['category_id'] . "',`brand_id`='" . $data['brand_id'] . "' WHERE `id`='" . $data['id'] . "'");
    }
    function delete($id)
    {
        $id = (int) $id;
        $db = new Database();
        return  $db->write("DELETE FROM `product` WHERE `id`='$id'");
    }
    function get_New_Products(){
        $db = new Database();
        return $db->read("SELECT id, name ,image, price FROM product ORDER BY id DESC LIMIT 6;");
    }
}
