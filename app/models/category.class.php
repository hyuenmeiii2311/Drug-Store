<?php
class Category
{
    function get_All()
    {
        $db = new Database();
        // return $db->read("SELECT category.id as id, category.name as name, product_mix.name as mix_name
        // FROM `category` INNER JOIN product_mix on category.product_mix_id = product_mix.id");
        return $db->read("select * from category");
    }
    function get_Data($limit = 0, $offset = 0)
    {
        $limit = (int)$limit;
        $offset = (int)$offset;
        $db = new Database();
        return $db->read("SELECT category.id as id, category.name as name, product_mix.name as mix_name
        FROM `category` INNER JOIN product_mix on category.product_mix_id = product_mix.id LIMIT " . $limit . " OFFSET " . $offset);
    }
    function get_Parent($id)
    {
        $id = (int) $id;
        $db = new Database();
        return $db->read("SELECT * FROM category WHERE product_mix_id = '" . $id . "'");
    }
    function count_Records()
    {
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM category;");
        return $result[0]->total;
    }
    function insert($POST){
        // show($POST);
        $db = new Database();
        $data = array();

        $data['name'] = trim($POST['name']);
        $data['mix_id'] = trim($POST['mix_id']);
        $db = new Database();
        $query = "INSERT INTO `category`( `name`, `product_mix_id`) VALUES ('" . $data['name'] . "','" . $data['mix_id'] . "')";
        $result = $db->write($query);

        return $result;
    }
    function get_By_Id($id){
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT category.id,category.name, category.product_mix_id, product_mix.name as mix_name
        FROM category INNER JOIN  product_mix on category.product_mix_id = product_mix.id WHERE category.id = $id");
        return $result[0];
    }
    function update($POST){
        $data = array();

        $data['cate_id'] = trim($POST['cate_id']);
        $data['name'] = trim($POST['name']);
        $data['mix_id'] = trim($POST['mix_id']);
        $db = new Database();
        return  $db->write("UPDATE `category` SET `name`='".$data['name']."',`product_mix_id`='".$data['mix_id']."' WHERE `id`='".$data['cate_id']."'");
    }
    function delete($id){
        $id = (int) $id;
        $db = new Database();
        return  $db->write("DELETE FROM `category` WHERE `id`='$id'");
    }
}
