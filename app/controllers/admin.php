<?php
class Admin extends Controller
{
  //login
  function index()
  {
    $data['page_title'] = "Login";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $user = $this->load_model("user");
      $user->login_Admin($_POST);
    }

    $this->view("admin/pages/login", $data);
  }

  //home
  function home()
  {
    //load model
    $product = $this->load_model('product');
    $data['total_products'] = $product->count_Records();
    $user = $this->load_model('user');
    $data['total_users'] = $user->count_Records();
    $order = $this->load_model('order');
    $data['total_orders'] = $order->count_Records();
    $brand = $this->load_model('brand');
    $data['total_brands'] = $brand->count_Records();

    $data['page_title'] = "Admin";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $data['total_report'] = $order->calculate_report($_POST['date_report']);
      $data['detail_report'] = $order->detail_report($_POST['date_report']);
    }

    //load view
    $this->view("admin/partials/_header", $data);
    $this->view("admin/index", $data);
    $this->view("admin/partials/_footer", $data);
  }

  function user()
  {
    $user = $this->load_model('user');
    $data['page_title'] = "quản lý khách hàng";
    if (!isset($_GET['action'])) {
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
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/user/list", $data);
      $this->view("admin/partials/_footer", $data);
    } elseif (isset($_GET['action'])) {
      $data['row'] = $user->get_By_Id($_GET['id']);
      $data['index'] = $_GET['action'];
      //edit
      if ($_GET['action'] == "edit" && isset($_GET['id'])) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result = $user->update($_POST);
          if ($result) {
            $_SESSION['success'] = "edit";
            header("Location: " . ROOT . "admin/user");
            die;
          }
        }

        //load view
        $this->view("admin/partials/_header", $data);
        $this->view("admin/pages/user/edit", $data);
        $this->view("admin/partials/_footer", $data);
      }
      //delete
      elseif ($_GET['action'] == "delete" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $user->delete($id);
        if ($result) {
          $_SESSION['success'] = "delete";
          header("Location: " . ROOT . "admin/user");
          die;
        }
      }
    }
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
    } elseif (isset($_GET['action'])) {
      $data['index'] = $_GET['action'];
      $product_mix = $this->load_model('productmix');
      $data['mix'] = $product_mix->get_All();
      //add
      if ($_GET['action'] == "add") {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result =$category->insert($_POST);
          if ($result) {
            $_SESSION['success'] = "add";
            header("Location:" . ROOT . "admin/category");
            die;
        }
        }
      }
      //edit
      elseif ($_GET['action'] == "edit" && isset($_GET['id'])) {
        $data['row'] = $category->get_By_Id($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result = $category->update($_POST);
          if($result){
            $_SESSION['success'] = "edit";
            header("Location: " . ROOT . "admin/category");
            die;
          }
          
        }
      }
      //delete
      elseif ($_GET['action'] == "delete" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $category->delete($id);
        if($result){
          $_SESSION['success'] = "delete";
         header("Location: " . ROOT . "admin/category");
         die;

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
    } 
    //edit
    elseif (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['id'])) {
      $data['row'] = $contact->get_By_Id($_GET['id']);

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $result = $contact->update($_POST);
        if ($result) {
          $_SESSION['success'] = "edit";
          header("Location: " . ROOT . "admin/contact");
          die;
        }
      }

      //load view
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/contact/edit", $data);
      $this->view("admin/partials/_footer", $data);
    } 
    //delete
    elseif ($_GET['action'] == "delete" && isset($_GET['id'])) {
      $id = $_GET['id'];
      $result = $contact->delete($id);
      if($result){
        $_SESSION['success'] = "delete";
      header("Location: " . ROOT . "admin/contact");
      die;

      }
      
    }
  }
  function product()
  {
    $product = $this->load_model('product');
    $category = $this->load_model('category');
    $brand = $this->load_model('brand');

    $data['page_title'] = "quản lý sản phẩm";

    if (!isset($_GET['action'])) {
      //pagination
      $limit = 5;
      $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
      $page_number = ($page_number < 1) ? 1 : $page_number;
      $offset = ($page_number - 1) * $limit; //start
      $total_records = $product->count_Records();
      $data['total_page'] = ceil($total_records / $limit);
      $data['current_page'] = $page_number;
      $data['index'] = "product";

      //check if it's a search
      $search = false;
      if (isset($_GET['keyword'])) {
        $keyword = addslashes($_GET['keyword']);
        $search = true;
      }

      //get product
      if ($search) {
        $data['keyword'] = $keyword;
        $data['product'] = $product->search($data['keyword'], $limit, $offset);
      } 
      else {
        $data['product'] = $product->get_All($limit, $offset);
      }

      //load view
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/product/list", $data);
      $this->view("admin/partials/_footer", $data);

    } elseif (isset($_GET['action'])) {
      $data['index'] = $_GET['action'];
      $data['category'] = $category->get_All();
      $data['brand'] = $brand->get_All();
      //add
      if ($_GET['action'] == "add") {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result = $product->insert($_POST, $_FILES);
          if ($result) {
            $_SESSION['success'] = "add";
            header("Location:" . ROOT . "admin/product");
            die;
          }
        }
      }
      //edit
      elseif ($_GET['action'] == "edit" && isset($_GET['id'])) {
        $data['row'] = $product->get_By_Id($_GET['id']);
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result = $product->update($_POST, $_FILES);
          if ($result) {
            $_SESSION['success'] = "edit";
            header("Location:" . ROOT . "admin/product");
            die;
          }
        }
      }
      //delete
      elseif ($_GET['action'] == "delete" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $product->delete($id);
        $_SESSION['success'] = "delete";
        return header("Location: " . ROOT . "admin/product");
      }

      //load view
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/product/add", $data);
      $this->view("admin/partials/_footer", $data);
    }
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
    } elseif (isset($_GET['action'])) {
      $data['index'] = $_GET['action'];
      //add
      if ($_GET['action'] == "add") {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result =$product_mix->insert($_POST);
          if ($result) {
            $_SESSION['success'] = "add";
            header("Location:" . ROOT . "admin/mix");
            die;
        }
        }
      }
      //edit
      elseif ($_GET['action'] == "edit" && isset($_GET['id'])) {
        $data['row'] = $product_mix->get_By_Id($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result = $product_mix->update($_POST);
          if($result){
            $_SESSION['success'] = "edit";
            header("Location: " . ROOT . "admin/mix");
            die;
          }
        }
      }
      //delete
      elseif ($_GET['action'] == "delete" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $product_mix->delete($id);
        $_SESSION['success'] = "delete";
        return header("Location: " . ROOT . "admin/mix");
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
      //add
      if ($_GET['action'] == "add") {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result = $brand->insert($_POST);
          if ($result) {
            header("Location:" . ROOT . "admin/brand");
            $_SESSION['success'] = "add";
            die;
          }
        }
      }
      //edit
      elseif ($_GET['action'] == "edit" && isset($_GET['id'])) {
        $data['row'] = $brand->get_By_Id($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $result = $brand->update($_POST);
          if ($result) {
            $_SESSION['success'] = "edit";
            header("Location: " . ROOT . "admin/brand");
            die;
          }
        }
      }
      //delete
      elseif ($_GET['action'] == "delete" && isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $brand->delete($id);
        if ($result) {
          $_SESSION['success'] = "delete";
          return header("Location: " . ROOT . "admin/brand");
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
    $data['page_title'] = "quản lý đơn hàng";

    if (!isset($_GET['action'])) {
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
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/order/list", $data);
      $this->view("admin/partials/_footer", $data);
    } elseif (isset($_GET['action']) && $_GET['action'] == "edit" && isset($_GET['id'])) {
      $data['row'] = $order->get_By_Id($_GET['id']);
      $data['detail'] = $order->getDetail_By_Id($_GET['id']);

      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $result = $order->update($_POST, $data['detail']);
        if ($result) {
          $_SESSION['success'] = "edit";
          header("Location: " . ROOT . "admin/order");
          die;
        }
      }

      //load view
      $this->view("admin/partials/_header", $data);
      $this->view("admin/pages/order/edit", $data);
      $this->view("admin/partials/_footer", $data);
    } elseif ($_GET['action'] == "delete" && isset($_GET['id'])) {
      $id = $_GET['id'];
      $result = $order->delete($id);
      $_SESSION['success'] = "delete";
      return header("Location: " . ROOT . "admin/order");
    }
  }
}
