<?php
class Contact extends Controller
{
    function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            // show($_POST);
            // $user = $this->load_model("user");
            // $user->add_Contact($_POST);
        
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

    function split_name($name)
    {
        // if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
        //     $data['name'] = $this->split_name($_SESSION['user']->name);
        //     // show($data['name']['first']);
        // }

        // chuyển đổi một chuỗi thành một mảng và mỗi phần tử được tách bởi một chuỗi con hay một ký tự nào đó
        $parts = explode(" ", $name);
        if (count($parts) > 1) {
            $lastname = array_pop($parts);  // array_pop - xóa bỏ phần tử cuối cùng ra khỏi mảng
            $firstname = implode(" ", $parts);  //implode - nối các phần tử mảng thành một chuỗi kết quả
        } else {
            $firstname = $name;
            $lastname = " ";
        }
        return array("first" => $firstname, "last" => $lastname);
    }
}
