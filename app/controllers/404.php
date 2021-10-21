<?php
class PageNotFound extends Controller
{
    function index()
    {
        $data['page_title'] = "Page Not Found";

        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();
        
        $this->view("client/header",$data);
        $this->view("client/404",$data);
        $this->view("client/footer",$data);
        
    }
 
}