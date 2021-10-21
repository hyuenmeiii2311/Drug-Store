<?php
class Detail extends Controller
{
    function index($id)
    {
        $id = (int)$id;
        
        //get product
        $db = new Database();
        $product = $db->read("select * from product where id = :id ",['id'=>$id]);
        $data['product'] =  $product[0];
        $data['page_title'] = ($product[0] != null) ? $product[0]->name : "Not Found";
        $product_brand = $db->read("SELECT brand.name FROM product,brand WHERE product.id = brand.id and product.id = :id;",['id'=>$id]);
        $data['product_brand'] =  $product_brand[0];


        //get related product
        $query = "SELECT product.id, product.name, product.image"
                 ." FROM product INNER JOIN category on product.category_id = category.id "
                 ." where product.category_id = ".$product[0]->category_id." and product.id != ".$id." LIMIT 5;";
        $related_products = $db->read($query);
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
                    //unset($_SESSION['cart']);
                } 
                else //else : add product
                {
                    $arr = array();
                    $arr['id'] = $row->id;
                    $arr['cart_quantity'] = $quantity;

                    $_SESSION['cart'][] = $arr;
                    //unset($_SESSION['cart']);
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

        header("Location:".ROOT."cart" );
      
       
    }
 
}
