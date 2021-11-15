<?php
class Order
{
    function get_All()
    {
        $db = new Database();
        return $db->read("SELECT * FROM `order` ");
    }
    function get_Data($limit = 0, $offset = 0)
    {
        $db = new Database();
        $limit = (int)$limit;
        $offset = (int)$offset;
        return $db->read("SELECT * FROM `order` LIMIT " . $limit . " OFFSET " . $offset);
    }

    function save_order($POST, $rows, $user_id, $total)
    {
        $db = new Database();
        $data = array();

        //save order
        $data['customer_id'] = trim($user_id);
        $data['created_date'] = date("Y-m-d h:i:s");
        if (is_array($rows)) {
            $data['delivery_name'] = trim($POST['c_name']);
            $data['delivery_address'] = trim($POST['c_address_detail']) . " " . trim($POST['c_address']);
            $data['delivery_phone'] = trim($POST['c_phone']);
            $data['note'] = ($POST['c_order_notes'] != null) ? trim($POST['c_order_notes']) : '';
        }
        $data['total'] = $total;

        $query = "INSERT INTO `order`(`customer_id`, `created_date`, `delivery_name`, `delivery_address`, `delivery_phone`, `note`, `total`, `status`) 
        VALUES ('" . $data['customer_id'] . "','" . $data['created_date'] . "','" . $data['delivery_name'] . "','" . $data['delivery_address'] . "','" . $data['delivery_phone'] . "','" . $data['note'] . "','" . $data['total'] . "','0')";
        $result = $db->write($query);


        //save order details
        $query1 = "SELECT id FROM `order` ORDER BY id DESC LIMIT 1";
        $result1 = $db->read($query1);

        if (is_array($result1)) {
            $order_id = $result1[0]->id;
            foreach ($rows as $row) {
                $query2 = "INSERT INTO `order_detail`( `order_id`, `product_id`, `quantity`) 
                VALUES ('" . $order_id . "','" . $row->id . "','" . $row->cart_quantity . "')";
                $result2 = $db->write($query2);
                //update quantity
                $query3 = "UPDATE product SET quantity = quantity - $row->cart_quantity WHERE id = $row->id;";
                $result3 = $db->write($query3);
            }
            unset($_SESSION['cart']);
            unset($_SESSION['number']);
            header("Location:" . ROOT . "thankyou");
            die;
        }
    }
    function count_Records()
    {
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM `order`;");
        return $result[0]->total;
    }

    function delete($id){
        $id = (int) $id;
        $db = new Database();

        $orderdetail_id = $db->read("SELECT `id` FROM `order_detail` WHERE `order_id` = $id;");
        $detail_ids = array();
        $detail_ids = array_column($orderdetail_id,'id');
        $ids_str = "'" .implode("','",$detail_ids) . "'";

        $db->write("DELETE FROM `order_detail` WHERE `order_id` IN ($ids_str)");
        return  $db->write("DELETE FROM `order` WHERE `id`='$id'");
    }

    function get_By_Id($id){
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT * FROM `order` WHERE id = $id");
        return $result[0];
    }

    function getDetail_By_Id($id){
        $id = (int)$id;
        $db = new Database();
        $result = $db->read("SELECT `order_detail`.`id`, `order_detail`.`order_id`, `order_detail`.`product_id`, `order_detail`.`quantity` as qty, `product`.`name`,`product`.`image`,`product`.`price` FROM `order_detail` INNER JOIN `product` on order_detail.product_id = product.id WHERE order_detail.order_id =$id;");
        return $result;
    }

    function update($POST){
        $data = array();

        $data['status'] = trim($POST['status']);
        $data['order_id'] = trim($POST['order_id']);
        $db = new Database();
        return  $db->write("UPDATE `order` SET `status`='".$data['status']."' WHERE `id`='".$data['order_id']."'");
    }
    function calculate_report($date){
        $db = new Database();
        $result = $db->read("SELECT SUM(total) as total FROM `order` WHERE MONTH(created_date) = MONTH('$date') AND YEAR(created_date) = YEAR('$date');");
        return $result[0]->total;
    }
    function detail_report($date){
        $db = new Database();
        $result = $db-> read("SELECT * FROM `order` WHERE MONTH(created_date) = MONTH('$date') AND YEAR(created_date) = YEAR('$date');");
        return $result;
    }
}
