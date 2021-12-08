<?php
class Home extends Controller
{
    function index()
    {

        //get new products
        $productModel = $this->load_model("product");
        $new_products = $productModel->get_New_Products();
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
