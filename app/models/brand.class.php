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
    function insert($POST)
    {
        show($POST);
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
}
