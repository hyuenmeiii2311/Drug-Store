<?php
class Order
{
    function get_All(){
        $db = new Database();
        return $db->read("SELECT * FROM `order`");
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
            $data['delivery_address'] = trim($POST['c_address_detail']) ." ". trim($POST['c_address']);
            $data['delivery_phone'] = trim($POST['c_phone']);
            $data['note'] = ($POST['c_order_notes'] != null) ? trim($POST['c_order_notes']) : '';
        }
        $data['total'] = $total;

        $query = "INSERT INTO `order`(`customer_id`, `created_date`, `delivery_name`, `delivery_address`, `delivery_phone`, `note`, `total`) 
        VALUES ('".$data['customer_id']."','".$data['created_date']."','".$data['delivery_name']."','".$data['delivery_address']."','".$data['delivery_phone']."','".$data['note']."','".$data['total']."')";
        $result = $db->write($query);



        //save order details
        $query1 = "SELECT id FROM `order` ORDER BY id DESC LIMIT 1";
        $result1 = $db->read($query1);

        if (is_array($result1)) {
            $order_id = $result1[0]->id;
            foreach ($rows as $row){
                $query2 = "INSERT INTO `order_detail`( `order_id`, `product_id`, `quantity`) 
                VALUES ('".$order_id."','".$row->id."','".$row->cart_quantity."')";
                $result2 = $db->write($query2);
            } 
            unset($_SESSION['cart']);
            unset($_SESSION['number']);
            header("Location:".ROOT."thankyou");
            die;
        }
    }   
    function count_Records(){
        $db = new Database();
        $result = $db->read("SELECT COUNT(*) AS total FROM order;");
        return $result[0]->total;
    }   
}
