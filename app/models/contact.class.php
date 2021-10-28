<?php
class Contact
{
    function get_All()
    {
        $db = new Database();
        return $db->read("SELECT * FROM contact ");
    }
    function get_Data($limit = 0, $offset = 0)
    {
        $db = new Database();
        $limit = (int)$limit;
        $offset = (int)$offset;
        return $db->read("SELECT * FROM contact LIMIT " . $limit . " OFFSET " . $offset);
    }
    function count_Records()
    {
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM contact;");
        return $result[0]->total;
    }
    function get_By_Id($id){
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT * FROM contact WHERE id = $id");
        return $result[0];
    }
    function update($POST){
        $data = array();

        $data['contact_id'] = trim($POST['contact_id']);
        $data['status'] = trim($POST['status']);
        $db = new Database();
        return  $db->write("UPDATE `contact` SET `status`='".$data['status']."' WHERE `id`='".$data['contact_id']."'");
    }
}
