<?php
class Admin extends Controller
{
    function index()
    {
        $data['page_title'] = "Admin";
        $this->view("admin/partials/_header",$data);
        // $this->view("admin/index",$data);
        $this->view("admin/partials/_pagination",$data);
        $this->view("admin/partials/_footer",$data);
        // $this->view("admin/pages/login",$data);
    }
    function user(){
        $user = $this->load_model('user');
        $data['user'] = $user->get_All();
        // show($data['user']);
        //load view
        $data['page_title'] = "quản lý khách hàng";
        $this->view("admin/partials/_header",$data);
        $this->view("admin/pages/user/list",$data);
        $this->view("admin/partials/_footer",$data);
    }
    
    function category(){
        $category = $this->load_model('category');
        $data['category'] = $category->get_All();

        //load view
        $data['page_title'] = "quản lý thể loại";
        $this->view("admin/partials/_header",$data);
        $this->view("admin/pages/category/list",$data);
        $this->view("admin/partials/_footer",$data);

    }
    function contact()
  {
    $contact = $this->load_model('contact');
    $data['contact'] = $contact->get_All();
    //load view
    $data['page_title'] = "quản lý liên hệ";
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/contact/list", $data);
    $this->view("admin/partials/_footer", $data);
  }
  function product()
  {
    $product = $this->load_model('product');
    $data['product'] = $product->get_All(5,0);
    //pagination
    $limit = 6;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
    $page_number = ($page_number < 1) ? 1 : $page_number;
    $offset = ($page_number - 1) * $limit; //start
    $total_records = $product->count_Records();
    $data['total_page'] = ceil($total_records/$limit);
    $data['current_page'] = $page_number;
    //load view
    $data['page_title'] = "quản lý sản phẩm";
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/product/list", $data);
    $this->view("admin/partials/_footer", $data);
  }
  function mix()
  {
    $product_mix = $this->load_model('productmix');
    $data['product_mix'] = $product_mix->get_All();
    //load view
    $data['page_title'] = "quản lý danh mục";
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/product_mix/list", $data);
    $this->view("admin/partials/_footer", $data);
  }
  function brand()
  {
    $brand = $this->load_model('brand');
    $data['brand'] = $brand->get_All();
    //load view
    $data['page_title'] = "quản lý thương hiệu";
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/brand/list", $data);
    $this->view("admin/partials/_footer", $data);
  }
  function order()
  {
    $order = $this->load_model('order');
    $data['order'] = $order->get_All();
    // show($data['order']);
    //load view
    $data['page_title'] = "quản lý đơn hàng";
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/order/list", $data);
    $this->view("admin/partials/_footer", $data);
  }

}
