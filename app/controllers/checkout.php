<?php
class CheckOut extends Controller
{
    function index()
    {
        $product = $this->load_model('product');
        $rows = false;
        //get product id 
        $prod_ids = array();
        if(isset($_SESSION['cart'])){
            $prod_ids = array_column($_SESSION['cart'],'id');
            $ids_str = "'" .implode("','",$prod_ids) . "'";
            $rows = $product->get_Products_By_Id($ids_str);
        }

        if(is_array($rows)){
            foreach($rows as $key => $row){
                foreach($_SESSION['cart'] as $item){
                    if($row->id == $item['id']){
                        $rows[$key]->cart_quantity =  $item['cart_quantity'];
                        break;
                    }
                } 
            }
        }
        sort($rows);//sắp xếp các mảng theo thứ tự tăng dần
        $data['cart'] = $rows;


        //calculate total
        $data['sub_total'] = 0;
        if($rows){
            foreach($rows as $key => $row){
                $total = $row->price * $row->cart_quantity;
                $data['sub_total'] += $total;
            }

        }

        //save checkout
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $order = $this->load_model('Order');
            $order->save_order($_POST,$rows,$_SESSION['user']->id,$data['sub_total']);
        }

        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();

        //load view
        $data['page_title'] = "Check Out";
        $this->view("client/header",$data);
        $this->view("client/checkout",$data);
        $this->view("client/footer",$data);
    }
 
}
