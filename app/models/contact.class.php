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
}
