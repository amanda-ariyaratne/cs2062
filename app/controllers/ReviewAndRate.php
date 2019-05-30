<?php

	class ReviewAndRate extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('User');
		}



		public function addReviewAction(){

			if ($_POST) {
				//dnd($_POST);
				$user = new User();
				$user = $user->currentLoggedInUser();

				//check logged in
				if ($user!=null) {
					$p_id = $_POST["product_id"];

					//check if the user have ordered items from vendors
					$order = new CustomerOrder();
					if($order->check_order_for_user_id($user->id)){

						//create objects of review and rate
						$review_obj = new Review();
						$rate_obj = new Rate();

						//add reviews to review table
						$fields = [
							"content" => $_POST["body"],
							"product_id" => $_POST["product_id"],
							"yes_no" => $_POST["yes-no"],
							"user_id" => $user->id
						];
						$review_obj->insert($fields);

						//add rating to rates table
						$fields_ratings = [
							"rate" => $_POST["star"],
							"product_id" => $_POST["product_id"],
							"user_id" => $user->id
						];
						$rate_obj->insert($fields_ratings);
						
						
						Router::redirect('home/productView/'.$p_id);
					}
					else{
						$validation = new Validate();
						$validation->displayErrorMsgs("You cannot review products. You must have a ordering history!");

	                    $params = $this->getProductViewParams($p_id);
	                    $this->view->displayErrors = $validation->displayErrors();
	                    $this->view->render('home/productView', $params);
						dnd("no orders");
					}
				}
				else{
					Router::redirect('account/login');
				}

			} else {
				$params = [];
			}
			$this->view->render('home/productView',$params);
		}



		public function calculateStarRating(){
			$p_id = 3;

			$rate_obj = new Rate();

			$starAvg = $rate_obj->calculateAvg($p_id);
		}



	    public function deleteReviewAction(){
	    	$rate_obj = new Rate();
	    	$rate_obj->deleteByID($_POST['rate_id']);

	    	$review_obj = new Review();
	    	$review_obj->deleteByID($_POST['review_id']);

	    	$params = $this->getProductViewParams($_POST['product_id']);
	    	$this->view->render('home/productView', $params);
	    }







	    private function getProductViewParams($p_id){
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
	                $review->rate_id = $reverse_rates[$i]->id;
					$review->current_user_id = $user_obj->currentLoggedInUser()->id;
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
	        $measurement = new Measurement('product_measurement');
	        $params['measurements'] = $measurement->getMeasurementByID($p_id);

	        return $params;
	    }

	}