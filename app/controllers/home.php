<?php
class Home extends Controller
{
    function index()
    {
        //get popular products

        //get new products
        $db = new Database();
        $new_products = $db->read("SELECT id, name ,image, price FROM product ORDER BY id DESC LIMIT 6;");
        $data['new_products'] = $new_products;

        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();
        
        //load view
        $data['page_title'] = "Home";
        $this->view("client/header",$data);
        $this->view("client/index",$data);
        $this->view("client/footer",$data);
    }
 
}
