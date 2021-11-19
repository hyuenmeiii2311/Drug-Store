<?php
class Contact extends Controller
{
    function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = $this->load_model("user");
            $user->add_Contact($_POST);
        }

        //get all Product Mix 
        $list = $this->load_model('ProductMix');
        $data['product_mix'] = $list->get_All();


        //load view
        $data['page_title'] = "Contact";
        $this->view("client/header", $data);
        $this->view("client/contact", $data);
        $this->view("client/footer", $data);
    }
}
