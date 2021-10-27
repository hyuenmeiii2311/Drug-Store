<?php
class About extends Controller
{
    function index()
    {
        $data['page_title'] = "About";

        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();
        
        $this->view("client/header",$data);
        $this->view("about",$data);
        // $this->view("client/test",$data);
        $this->view("client/footer",$data);
    }
    
}
