<?php

class CartController extends Controller{

    public function addToCartAction(){
        $validation = new Validate();
        if ($_POST) {

            //check validation of the entered data
            $to_check['color'] = [
                'display' => "Color",
                'required' => true
            ];
            $measurements = unserialize($_POST['measurements']);
            foreach ($measurements as $key => $mes) {
                $to_check["measuremnt" . $key] = [
                    'display' => $mes,
                    'is_numeric' => true,
                    'required' => true
                ];
            }
            $validation->check($_POST, $to_check);

            //check if the user is logged in
            $user = new User();
            $user = $user->currentLoggedInUser();

            if ($user != null) {
                if ($validation->passed()) {
                    $fields = [
                        "vendor_id" => $_POST["vendor_id"],
                        "name" => $_POST["name"],
                        "image"=> $_POST["image"],
                        "price" => $_POST["price"],
                        "product_id" => $_POST["product_id"],
                        "user_id" => $user->id,
                        "color" => $_POST["color"],
                        "quantity" => $_POST["quantity"],
                    ];
                    //dnd($fields);

                    $cart = new Cart();
                    $status = $cart->addItem($fields);

                    $measurements = unserialize($_POST['measurements']);
                    foreach ($measurements as $key => $mes) {
                        $fields[$mes] = $_POST["measuremnt" . $key];

                    }
                    //dnd($fields);

                    $params = $this->getProductViewParams();
                    array_push($params,$status);
                    $this->view->render('home/productView' , $params);
                    

                }
                else {
                    ////////////////////////////////////////////////load product details
                    $params = $this->getProductViewParams();
                    $this->view->displayErrors = $validation->displayErrors();
                    $this->view->render('home/productView', $params);
                }
            } else {
                Router::redirect('account/login');
            }
        }
    }

    public function cartAction(){
        $user = new User();
        $user = $user->currentLoggedInUser();
        $userId = $user->id;

        if ($user != null) {
            $cart = new Cart();
            $cartItems = $cart->getCartItems($userId);
            $params = [$cartItems];
            $this->view->render('cart/cart',$params);
        }
        else {
            Router::redirect('account/login');
        }

    }

    public function removeAction($i,$u_id){
        $cart = new Cart();
        $cart->remove($i);

        $this->cartAction($u_id);
    }

    public function emptyCartAction($u_id){
        $cart = new Cart();
        $cart->emptyCart($u_id);

        $this->cartAction($u_id);

    }


    private function getProductViewParams(){
        $p_id = $_POST["product_id"];
        $params = array();
        //load product table
        $product = new Product();
        $product_obj = $product->findById($p_id);
        //load sub categories table and instert sub category name into product
        $sub_category_obj = new SubCategory();
        $sub_category_details = $sub_category_obj->findByID($product_obj->sub_category_id);
        $product_obj->sub_category_name = $sub_category_details->name;
        //load categories table and instert main category name -> product_obj
        $category_obj = new Category();
        $category_details = $category_obj->findByID($sub_category_details->main_id);
        $product_obj->main_category_name = $category_details->name;
        array_push($params, $product_obj);
        //add product images array - inster to params
        $img = new Image('tailor_product_image');
        array_push($params,$img->getImage($product_obj));
        //load review table
        $review_object = new Review();
        $review_details = $review_object->findByProductID($p_id);
        //load rates table
        $rate_obj = new Rate();
        if (count($review_details) != 0) {
            $starAvg = $rate_obj->calculateAvg($p_id);
            $product_obj->starRating = $starAvg;
        }
        if (!empty($review_details)) {
            $rate_details = $rate_obj->findByProductID($p_id);
        }//new user object
        $user_obj = new User();
        //add vendor name
        $product_obj->vendor = $user_obj->findByUserID($product_obj->vendor_id);
        //add rete and user detail
        $reverse_reviews = array();
        $reverse_rates = array();
        if (!empty($review_details)) {
            $reverse_reviews = array_reverse($review_details);
            $reverse_rates = array_reverse($rate_details);
            //load user table
            $i = 0;
            foreach ($reverse_reviews as $review) {
                $user = $user_obj->findByUserID($review->user_id);
                $review->user_fname = $user->first_name;
                $review->user_lname = $user->last_name;
                //add rating to review
                $review->rate = $reverse_rates[$i]->rate;
                $i++;
            }
        }
        array_push($params, $reverse_reviews);
        //add more products by vendor
        $related_products = $product->findBy_vendorId($product_obj->vendor_id, 4, $p_id);
        if (is_array($related_products)) {
            $image_array = $img->getMoreImagesByVendor($related_products);
        }
        array_push($params, $image_array);
        //load product colors
        $color = new Color();
        $params['colors'] = $color->getColorByproductID($p_id);
        //load product measurements
        $measurement = new Measurement();
        $params['measurements'] = $measurement->getMeasurementByID($p_id);

        return $params;
    }

}