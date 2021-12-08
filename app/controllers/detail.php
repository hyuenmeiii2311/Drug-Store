<?php
class Detail extends Controller
{
    function index($id)
    {
        //load model
        $productModel = $this->load_model('product');
        $brandModel = $this->load_model('brand');
        
        //get product
        $product = $productModel->get_By_Id($id);
        $data['product'] =  $product;
        $data['page_title'] = ($product != null) ? $product->name : "Not Found";
        $product_brand = $brandModel->getName_By_ProductId($id);
        $data['product_brand'] =  $product_brand;

        //get related product
        $related_products = $productModel->get_Related_Products($product->category_id, $id);
        $data['related_products'] = is_array($related_products) ? $related_products : false ;
        
        //get all Product Mix 
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();

        //add to cart
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $this->add_to_cart($id,$_POST['quantity']);
        }
        
        //load view
        $this->view("client/header",$data);
        $this->view("client/detail",$data);
        $this->view("client/footer",$data);
    }

    function add_to_cart($id = '',$quantity = 1)
    {
        $id = (int)$id;

        $db = new Database();
        $rows = $db->read("select * from product where id = :id limit 1", ['id' => $id]);

        //check if product exists
        if ($rows) {

            $row = $rows[0];

            //check if SESSION['cart'] exists
            if (isset($_SESSION['cart'])) {

                $ids = array_column($_SESSION['cart'], "id");

                //check if cart has this product, increase quantity
                if (in_array($row->id, $ids)) {
                    $key = array_search($row->id, $ids);
                    $_SESSION['cart'][$key]['cart_quantity'] += $quantity;
                } 
                else //else : add product
                {
                    $arr = array();
                    $arr['id'] = $row->id;
                    $arr['cart_quantity'] = $quantity;

                    $_SESSION['cart'][] = $arr;
                }
            } 
            else // else : add new product
            {
                $arr = array();
                $arr['id'] = $row->id;
                $arr['cart_quantity'] = $quantity;

                $_SESSION['cart'][0] = $arr;
            }
        }

        header("Location:".ROOT."cart"); 
    }
 
}
