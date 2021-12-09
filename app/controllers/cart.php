<?php
class Cart extends Controller
{
    function index()
    {
        $product = $this->load_model('product');
        $rows = false;
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
        // show($_SESSION['cart']);
        //sort($rows);//sắp xếp các mảng theo thứ tự tăng dần
        $data['cart'] = $rows;

        //calculate total + count number products in cart
        $data['sub_total'] = 0;
        $_SESSION['number'] = 0;
        if($rows){
            foreach($rows as $key => $row){
                $total = $row->price * $row->cart_quantity;
                $number = $row->cart_quantity;

                $data['sub_total'] += $total;
                $_SESSION['number'] += $number;
            }

        }
        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();
        //load view
        $data['page_title'] = "Cart";
        $this->view("client/header", $data);
        $this->view("client/cart", $data);
        $this->view("client/footer",$data);

        //header("Location:".ROOT."shop");
    }
    private $redirect_to = "";

    function add_to_cart($id = '',$quantity = 1)
    {
        // $this->set_redirect();
        $id = (int)$id;

        $product = $this->load_model('product');
        $rows = $product->get_Product($id);
        
        //check if product exists
        if ($rows) {

            $row = $rows[0];

            //check if SESSION['cart'] exists
            if (isset($_SESSION['cart'])) {

                $ids = array_column($_SESSION['cart'], "id");

                //check if cart has this product, increase quantity
                if (in_array($row->id, $ids)) {
                    $key = array_search($row->id, $ids);
                    $_SESSION['cart'][$key]['cart_quantity'] += $quantity;
                } 
                else //else : add product
                {
                    $arr = array();
                    $arr['id'] = $row->id;
                    $arr['cart_quantity'] = $quantity;

                    $_SESSION['cart'][] = $arr;
                }
            } 
            else // else : add new product
            {
                $arr = array();
                $arr['id'] = $row->id;
                $arr['cart_quantity'] = $quantity;

                $_SESSION['cart'][0] = $arr;
            }
        }

        header("Location:".ROOT."cart");
        // $this->redirect();
       
    }
    function add_quantity($id = ''){
        // $this->set_redirect();
        // $id = (int)$id;
        $obj = json_decode($id);
        $id = (int)$obj->id;

        if (isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key=> $item){
                if($item['id'] == $id){
                    $_SESSION['cart'][$key]['cart_quantity'] += 1;
                    break;
                }
            }
        }

        // $this->redirect();
        $obj->data_type = "add_quantity";
        echo json_encode($obj);

    }

    function subtract_quantity($id = ''){
        // $this->set_redirect();
        // $id = (int)$id;
        $obj = json_decode($id);
        $id = (int)$obj->id;

        if (isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key=> $item){
                if($item['id'] == $id){
                    if($_SESSION['cart'][$key]['cart_quantity'] == 1){
                        unset($_SESSION['cart'][$key]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                        break;
                    }
                    else{
                        $_SESSION['cart'][$key]['cart_quantity'] -= 1;
                        break;
                    }
                    //show($_SESSION['cart']);
                }
            }   
        }

        // $this->redirect();
        $obj->data_type = "subtract_quantity";
        // echo json_encode($obj);
        
    }

    function remove($id = ''){
        $obj = json_decode($id);
        //$this->set_redirect();
        $id = (int)$obj->id;
        if (isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key=> $item){
                if($item['id'] == $id){
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    show($_SESSION['cart']);      
                    break;
                }
            }      
        }
        //$this->redirect();
        $obj->data_type = "remove";
        //echo json_encode($obj);
        
    }

    function edit_quantity($data = ""){
        $obj = json_decode($data);

        $id = (int)$obj->id;
        $quantity =(int) esc($obj->quantity);
        if (isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key=> $item){
                if($item['id'] == $id){
                    $_SESSION['cart'][$key]['cart_quantity'] = $quantity;        
                    break;
                }
            }
        }

        $obj->data_type = "edit_quantity";
        // echo json_encode($obj);
    }

    private function redirect(){
        header("Location: " . $this->redirect_to);
        die;
    }
    
    private function set_redirect(){
        //HTTP referer là một trường HTTP header xác định địa chỉ của trang web liên kết với tài nguyên được yêu cầu. Bằng cách kiểm lại trang giới thiệu, trang web mới có thể thấy yêu cầu bắt nguồn từ đâu.
        if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != ""){
            $this->redirect_to = $_SERVER['HTTP_REFERER'];
        }
        else{
            $this->redirect_to = ROOT . "cart";
        }
    }
    
}
