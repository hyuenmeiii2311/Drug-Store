<?php
class ThankYou extends Controller
{
    function index()
    {
        
        $data['page_title'] = "Thank You";

        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();
        
        $this->view("client/header",$data);
        $this->view("client/thankyou",$data);
        $this->view("client/footer",$data);
    }
 
}
