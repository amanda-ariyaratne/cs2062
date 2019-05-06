<?php

	class Home extends Controller {
        public $image;

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$this->view->render('home/index');
		}

		public function AllVendorsAction($no){

			$tailorshop=new Tailorshop('tailor_shop');
			
			$details = $tailorshop->getShops((6*$no-6),6);			
			$noOfProducts = $tailorshop->noOfShops();

			$params=array($details,$no,$noOfProducts);

			$this->view->render('home/AllVendors',$params);
		}

		public function VendorPageAction($a){
			$product=new Product('product');
			$details=$product->getViewDetailsOfId($a);

			$param=$details[0];
			$noOfProducts =$details[1];			

			$params=array($param,$a,$noOfProducts);
			$this->view->render('home/VendorPage',$params);
		}

		public function VendorPage2Action(){
			$this->view->render('home/VendorPage2');
		}



		public function ProductListAction($a='0'){

			$product=new Product('product');
			$details=$product->getViewDetails($a);

			$param=$details[0];
			$noOfProducts =$details[1];			

			$params=array($param,$a,$noOfProducts);
			// $db=DB::getInstance();
			// $limit = array('limit'=>(3*$a-3).',3');
			// $details = $db->find('product_features',$limit);
			// //dnd($details);
			// foreach ($details as $row){

			// 	$pr_sub_id=$row->sub_category_id;
			// 	$name=$row->name;
				
			// 	$condition=array('conditions'=> ['product_id = ?','pr_name = ?'],'bind'=>[$pr_sub_id,$name]);
				

			// 	$image_details = $db->find('images',$condition);

			// 	//dnd ($image_details);
				
			// 	$imageList=array();
				

			// 	$images = array();
			// 	$row->images = $images;

			// 	if (is_array($image_details)) {
			// 		foreach ($image_details as $imagePath){
			// 			array_push($row->images,$imagePath->image_path);
			// 		}
			// 	}
					
			


			$this->view->render('home/ProductList',$params);
		}


		public function CustomerRequestViewAction($a){

			$viewRequest = new CustomRequest('custom_request');

			$details= $viewRequest-> getViewRequestDetails($a);
			$param=$details[0];
			$noOfProducts =$details[1];
			

			$params=array($param,$a,$noOfProducts);

			$this->view->render('home/CustomerRequests',$params);
		}




		public function ProductRequestAction(){

			if($_POST){
				$customRequest=new CustomRequest('custom_request');
				$customRequest-> createRequest();
			
				$_SESSION['alert']='
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">			  
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

				<div class="container">
					<div class="alert alert-success fade in">    
				    	<strong>Success!</strong> You have successfully added a CUSTOM REQUEST!
				  	</div>
				</div>';	

				Router::redirect('home/ProductRequest');				
			}

        	$this->view->render('home/ProductRequest');

        }

        public function addProductAction(){

        	$db = DB::getInstance();
        	$categories = $db->find('sub_categories');
        	$measurements = $db->find('measurement_types');
            $params = [$categories,$measurements];
        	if ($_POST) {
				$product=new Product('product');
				$product-> addProduct();

				//redirect to some page\\
				Router::redirect('home/addProduct');	
            }
            $this->view->render('home/addProduct', $params);

        }



        public function productViewAction($p_id){

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
			$product_obj->main_category_name = $category_details->category_name;
			array_push($params,$product_obj);

			//add product images array - inster to params
			$img = new Image('image');
			array_push($params,$img->getImage($p_id));

			//load review table
			$review_object = new Review();
			$review_details = $review_object->findByProductID($p_id);

			//load rates table
			$rate_obj = new Rate();
			if(count($review_details)!=0){
				$starAvg = $rate_obj->calculateAvg($p_id);
				$product_obj->starRating = $starAvg;
			}


			if(!empty($review_details)){
				$rate_details = $rate_obj->findByProductID($p_id);
			}

			//new user object
			$user_obj = new User();

			//add vendor name
			$product_obj->vendor = $user_obj->findByUserID($product_obj->vendor_id);

			//add rete and user detail
			$reverse_reviews = array();
			$reverse_rates = array();

			if(!empty($review_details)){
				$reverse_reviews = array_reverse($review_details);
				$reverse_rates = array_reverse($rate_details);

				//load user table
				$i = 0;
				foreach($reverse_reviews as $review){
					$user = $user_obj->findByUserID($review->user_id);
					$review->user_fname = $user->first_name;
					$review->user_lname = $user->last_name;

					//add rating to review
					$review->rate = $reverse_rates[$i]->rate;
					$i ++;

				}
			}
			array_push($params,$reverse_reviews);


			//add more products by vendor
			$related_products = $product->findBy_vendorId($product_obj->vendor_id , 4 , $p_id);
			if(is_array($related_products)){
				$image_array = $img->getMoreImagesByVendor($related_products);
			}
			array_push($params, $image_array);

			//load product colors
			$color = new Color();
			$params['colors'] = $color->getColorByproductID($p_id);

			//dnd($params);

			$this->view->render('home/productView',$params);
		}



		public function CategoryItemAction($id){
			$db=DB::getInstance();
			$condition=array('conditions'=> 'sub_category = ?','bind'=>[$id]);
			$limit = array('limit'=>$id.',3');
			$details=$db->find('products',$condition,$limit);	
			$temp= array($db->find('products',$condition));
			$noOfProducts = count($temp[0]);
			$params=array($details,$id,$noOfProducts);
			$this->view->render('home/ProductList',$params);
		}



		// public function ProductListAction($a='1'){

		// 	$db=DB::getInstance();
		// 	$limit = array('limit'=>$a.',6');
		// 	$details = $db->find('products',$limit);

		// 	$temp= array($db->find('products'));
		// 	$noOfProducts = count($temp[0]);

		// 	$params=array($details,$a,$noOfProducts);

		// 	$this->view->render('home/ProductList',$params);
		// }


		public function contactUsAction(){
			$this->view->render('home/ContactUs');
		}

		public function aboutUsAction(){
			$this->view->render('home/AboutUs');
		}

		public function frontPageAction(){
			$this->view->renderFrontPage('home/frontPage');
		}




	}