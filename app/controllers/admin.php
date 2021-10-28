<?php
class Admin extends Controller
{
  //login
  function index()
  {
    $data['page_title'] = "Login";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      // show($_POST);

      $user = $this->load_model("user");
      $user->login_Admin($_POST);
    }
    $this->view("admin/pages/login", $data);
  }

  //home
  function home()
  {
    $data['page_title'] = "Admin";

    $this->view("admin/partials/_header", $data);
    $this->view("admin/index", $data);
    $this->view("admin/partials/_footer", $data);
  }

  function user()
  {
    $user = $this->load_model('user');
    //pagination
    $limit = 5;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
    $page_number = ($page_number < 1) ? 1 : $page_number;
    $offset = ($page_number - 1) * $limit; //start
    $total_records = $user->count_Records();
    $data['total_page'] = ceil($total_records / $limit);
    $data['current_page'] = $page_number;
    $data['index'] = "user";


    $data['user'] = $user->get_Data($limit, $offset);
    //load view
    $data['page_title'] = "quản lý khách hàng";
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/user/list", $data);
    $this->view("admin/partials/_footer", $data);
  }

  function category()
  {
    $category = $this->load_model('category');
    $data['page_title'] = "quản lý thể loại";

    if (!isset($_GET['action'])) {
      //pagination
      $limit = 5;
      $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
      $page_number = ($page_number < 1) ? 1 : $page_number;
      $offset = ($page_number - 1) * $limit; //start
      $total_records = $category->count_Records();
      $data['total_page'] = ceil($total_records / $limit);
      $data['current_page'] = $page_number;
      $data['index'] = "category";

      $data['category'] = $category->get_Data($limit, $offset);

      //load view

      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/category/list", $data);
      $this->view("admin/partials/_footer", $data);
    }elseif (isset($_GET['action'])) {
      $data['index'] = $_GET['action'];
      $product_mix = $this->load_model('productmix');
      $data['mix'] = $product_mix->get_All();
      //add
      if ($_GET['action'] == "add") {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $category->insert($_POST);
        }
      } 
      //edit
      elseif ($_GET['action'] == "edit" && isset($_GET['id'])) {
        $data['row'] = $category->get_By_Id($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $category->update($_POST);
          header("Location: " . ROOT . "admin/category");
        }
      }

      //load view
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/category/add", $data);
      $this->view("admin/partials/_footer", $data);
    } 
  }
  function contact()
  {
    $contact = $this->load_model('contact');
    $data['page_title'] = "quản lý liên hệ";
    if (!isset($_GET['action'])) {
    //pagination
    $limit = 5;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
    $page_number = ($page_number < 1) ? 1 : $page_number;
    $offset = ($page_number - 1) * $limit; //start
    $total_records = $contact->count_Records();
    $data['total_page'] = ceil($total_records / $limit);
    $data['current_page'] = $page_number;
    $data['index'] = "contact";

    $data['contact'] = $contact->get_Data($limit, $offset);
    //load view
    
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/contact/list", $data);
    $this->view("admin/partials/_footer", $data);
    }elseif (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['id'])) {
      $data['row'] = $contact->get_By_Id($_GET['id']);
  
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result = $contact->update($_POST);
          if($result){
            header("Location: " . ROOT . "admin/contact");
          }  
        }
  
      //load view
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/contact/edit", $data);
      $this->view("admin/partials/_footer", $data);
    } 
  }
  function product()
  {
    $product = $this->load_model('product');

    //pagination
    $limit = 5;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
    $page_number = ($page_number < 1) ? 1 : $page_number;
    $offset = ($page_number - 1) * $limit; //start
    $total_records = $product->count_Records(); //viết thêm câu truy vấn đếm số bản ghi ở models
    $data['total_page'] = ceil($total_records / $limit);
    $data['current_page'] = $page_number;
    $data['index'] = "product"; //thay đổi tên function

    //get product
    $data['product'] = $product->get_All($limit, $offset); //thêm $limit,$offset ở models

    //load view
    $data['page_title'] = "quản lý sản phẩm";
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/product/list", $data);
    $this->view("admin/partials/_footer", $data);
  }

  function mix()
  {
    $product_mix = $this->load_model('productmix');
    $data['page_title'] = "quản lý danh mục";

    if (!isset($_GET['action'])) {
    //pagination
    $limit = 5;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
    $page_number = ($page_number < 1) ? 1 : $page_number;
    $offset = ($page_number - 1) * $limit; //start
    $total_records = $product_mix->count_Records(); 
    $data['total_page'] = ceil($total_records / $limit);
    $data['current_page'] = $page_number;
    $data['index'] = "mix";

    $data['product_mix'] = $product_mix->get_Data($limit, $offset);
    
    //load view
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/product_mix/list", $data);
    $this->view("admin/partials/_footer", $data);
  }elseif (isset($_GET['action'])) {
    $data['index'] = $_GET['action'];
    //add
    if ($_GET['action'] == "add") {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $product_mix->insert($_POST);
      }
    } 
     //edit
     elseif ($_GET['action'] == "edit" && isset($_GET['id'])) {
      $data['row'] = $product_mix->get_By_Id($_GET['id']);

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $product_mix->update($_POST);
        header("Location: " . ROOT . "admin/mix");
      }
    }

    //load view
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/product_mix/add", $data);
    $this->view("admin/partials/_footer", $data);
  } 
  }
  function brand()
  {
    $data['page_title'] = "quản lý thương hiệu";
    $brand = $this->load_model('brand');

    if (!isset($_GET['action'])) {
      //pagination
      $limit = 5;
      $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
      $page_number = ($page_number < 1) ? 1 : $page_number;
      $offset = ($page_number - 1) * $limit; //start
      $total_records = $brand->count_Records();
      $data['total_page'] = ceil($total_records / $limit);
      $data['current_page'] = $page_number;
      $data['index'] = "brand";

      $data['brand'] = $brand->get_Data($limit, $offset);

      //load view
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/brand/list", $data);
      $this->view("admin/partials/_footer", $data);
    } elseif (isset($_GET['action'])) {
      $data['index'] = $_GET['action'];
      if ($_GET['action'] == "add") {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $brand->insert($_POST);
        }
      } elseif ($_GET['action'] == "edit" && isset($_GET['id'])) {
        $data['row'] = $brand->get_By_Id($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $brand->update($_POST);
          header("Location: " . ROOT . "admin/brand");
        }
      }

      //load view
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/brand/add", $data);
      $this->view("admin/partials/_footer", $data);
    }
  }


  function order()
  {
    $order = $this->load_model('order');
    //pagination
    $limit = 5;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
    $page_number = ($page_number < 1) ? 1 : $page_number;
    $offset = ($page_number - 1) * $limit; //start
    $total_records = $order->count_Records();
    $data['total_page'] = ceil($total_records / $limit);
    $data['current_page'] = $page_number;
    $data['index'] = "order";

    $data['order'] = $order->get_Data($limit, $offset);

    //load view
    $data['page_title'] = "quản lý đơn hàng";
    $this->view("admin/partials/_header", $data);
    $this->view("admin/pages/order/list", $data);
    $this->view("admin/partials/_footer", $data);
  }
}
