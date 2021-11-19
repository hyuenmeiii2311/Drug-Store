<?php
class Brand
{
    
    function get_All()
    {
        $db = new Database();
        return $db->read("SELECT * FROM brand");
    }
    function get_Data($limit = "", $offset = "")
    {
        $limit = (int)$limit;
        $offset = (int)$offset;
        $db = new Database();
        return $db->read("SELECT * FROM brand LIMIT " . $limit . " OFFSET " . $offset);
    }
    function count_Records()
    {
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM brand;");
        return $result[0]->total;
    }
    function getName_By_ProductId($id){
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT brand.name FROM product inner join brand on product.brand_id = brand.id WHERE product.id = brand.id and product.id = $id;");
        return $result[0];
    }
    function insert($POST)
    {
        // show($POST);
        $db = new Database();
        $data = array();

        $data['name'] = trim($POST['name']);
        $db = new Database();
        $query = "INSERT INTO `brand`(`name`) VALUES ('" . $data['name'] . "')";
        $result = $db->write($query);

        if ($result) {
            header("Location:" . ROOT . "admin/brand");
            die;
        }
    }
    function get_By_Id($id){
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT * FROM brand WHERE id = $id");
        return $result[0];
    }
    function update($POST){
        $data = array();

        $data['name'] = trim($POST['name']);
        $data['brand_id'] = trim($POST['brand_id']);
        $db = new Database();
        return  $db->write("UPDATE `brand` SET `name`='".$data['name']."' WHERE `id`='".$data['brand_id']."';");
    }
    function delete($id){
        $id = (int) $id;
        $db = new Database();
        return  $db->write("DELETE FROM `brand` WHERE `id`='$id'");
    }
}
