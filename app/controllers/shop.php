<?php
class Shop extends Controller
{
    function index($type ='',$id ='')
    {
        //get models: Product Mix + Categories + Brand
        $list= $this->load_model('ProductMix');
        $data['product_mix']= $list->get_All();
        $cate = $this->load_model('Category');
        $data['category'] = $cate->get_All();
        $brand = $this->load_model('Brand');
        $data['brand'] = $brand->get_All();
        $product = $this->load_model('Product');

        //pagination
        $limit = 6;
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1; //current_page
        $page_number = ($page_number < 1) ? 1 : $page_number;
        $offset = ($page_number - 1) * $limit; //start
        $total_records = $product->count_Records();
        $data['total_page'] = ceil($total_records/$limit);
        $data['current_page'] = $page_number;

        //check if it's a search
        $search = false;
        if (isset($_GET['keyword'])) {
            $keyword = addslashes($_GET['keyword']);
            $search = true;
        }

        //get products
        if ($search) {
            $data['keyword'] = $keyword;
            $products = $product->search($data['keyword'],$limit,$offset);
        } 
        else if(isset($type) && $type !=''){
            switch($type){
                case "brand":
                    $products = $product->get_By_BrandId($id,$limit,$offset);
                    break;
                case "category":
                    $products = $product->get_By_ProductMixId($id,$limit,$offset);
                    break;
                case "subcategory":
                    $products = $product->get_By_CategoryId($id,$limit,$offset);
                    break;
            }
        }
        else{
            $products = $product->get_All($limit,$offset);
        }
       
        $data['products'] = $products;
        
        //load view
        $data['page_title'] = "Shop";
        $data['show_search'] = true;
        $this->view("client/header", $data);
        $this->view("client/shop", $data);
        $this->view("client/footer",$data);
    }
}
