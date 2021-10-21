<?php
class Login extends Controller
{
    function index()
    {
        $data['page_title'] = "Login";

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            $user = $this->load_model("user");
            $user->login($_POST);
        }

        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();
        
        $this->view("client/header",$data);
        $this->view("client/login",$data);
        $this->view("client/footer",$data);
    }
 
}