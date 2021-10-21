<?php
class SignUp extends Controller
{
    function index()
    {
        $data['page_title'] = "Sign Up";

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $user = $this->load_model("user");
            $user->signUp($_POST);
        }

        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();

        //load view
        $this->view("client/header",$data);
        $this->view("client/signup",$data);
        $this->view("client/footer",$data);
    }

 
}
