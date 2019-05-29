<?php

	class Home extends Controller {
        public $image;
        private $_user;

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$this->view->renderFrontPage('home/index');
		}

		public function testAction(){
			$product=new Product();
			$product->getAcceptedRequest('2','1','2');
		}
		
		public function AllVendorsAction($no){

			$tailorshop=new Tailorshop('tailor_shop');

			$details = $tailorshop->getShops((6*$no-6),6);

			foreach ($details as $store) {

				// set rating
				$tailor_id = $store->vendor_id;
				$rating = new Rate();
				$store->rating = $rating->getTailorRating($tailor_id);


				// set images
				$product = new Product();
				$all_products = $product->find(array('conditions' => 'vendor_id = ?', 'bind' => [$tailor_id]));
				$images = [];
				foreach ($all_products as $product) {

					$image=new Image('tailor_product_image');
                    $product_images=$image->getImage($product);
                    $images = array_merge($images, $product_images);
				}
				$images_total = count($images);
				if ($images_total < 7) {
					$store->images = $images;
				} else {
					$store->images = array_rand($images, 6);
				}

			}

			$noOfProducts = $tailorshop->noOfShops();

			$params=array($details,$no,$noOfProducts,'All Tailors');

			$this->view->render('home/AllVendors',$params);
		}

		public function VendorPageAction($a){
			$product=new Product('product');
			$details=$product->getPageVendor($a);

			$param=$details[0];
			$noOfProducts =$details[1];

			$params=array($param,$a,$noOfProducts,$param[0]->vendorName);
			$this->view->render('home/VendorPage',$params);


			//get vendor name
		}

		public function ProductListAction($a){
			$product=new Product();

			$details=$product->getViewDetails($a);

			$param=$details[0];
			$noOfProducts =$details[1];			

			$params=array($param,$a,$noOfProducts,'All Products');

			$this->view->render('home/ProductList',$params);
		}

		public function ProductCategoryAction($sub_cat_id,$a){
			// dnd($sub_cat_id);
			$product=new Product();

			$details=$product->getCategoryViewDetails($a,$sub_cat_id);

			$param=$details[0];
			$noOfProducts =$details[1];		

			// dnd(count($param));	

			$sub=new SubCategory();
			$name=$sub->findByID($sub_cat_id)->name;
			// dnd($name);

			$params=array($param,$a,$noOfProducts,$sub_cat_id,$name);

			$this->view->render('home/ProductCategoryView',$params);
		}

// chamodi akka's edited page

        public function addProductAction(){
        	if (currentUser()->role_id != 3) {
        		$db = DB::getInstance();
        		$main_category = $db->find('category');
	            $sub_category = $db->find('sub_category');
	            $measurements = $db->find('measurement_type');
	            $params = [$sub_category,$measurements,$main_category];
	            if ($_POST) {
	                $product=new Product('product');
	                $product->addProduct();
	                //redirect to some page\\
	                Router::redirect('home/addProduct');
	            }
	            $this->view->render('home/addProduct', $params);
        	} else {
        		Router::redirect('home/ProductList/1');
        	}

        }



        public function productViewAction($p_id){

			$params = array();


			//load product table
			$product = new Product('product');
			$product_obj = $product->findById($p_id);



			//load sub categories table and instert sub category name into product
			$sub_category_obj = new SubCategory();
			$sub_category_details = $sub_category_obj->findByID($product_obj->sub_category_id);
			$product_obj->sub_category_name = $sub_category_details->name;

			//load categories table and instert main category name -> product_obj
			$category_obj = new Category();
			$category_details = $category_obj->findByID($sub_category_details->main_id);
			$product_obj->main_category_name = $category_details->name;
			array_push($params,$product_obj);

			//add product images array - inster to params
			$img = new Image('tailor_product_image');
			array_push($params,$img->getImage($product_obj->id));
			
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

			//load product measurements
			$measurement = new Measurement('product_measurement');
			$params['measurements'] = $measurement->getMeasurementByID($p_id);

			$params['vendor_id'] = $product_obj->vendor_id;

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





		public function contactUsAction(){
			$this->view->render('home/ContactUs');
		}

		public function aboutUsAction(){
			$this->view->render('home/AboutUs');
		}

		public function frontPageAction(){
			$this->view->renderFrontPage('home/frontPage');
		}

		public function newProductsAction(){
			$this->view->render('home/newProducts');
		}
		

        public function subscribeToNewsletterAction(){
        	$email = $_POST['subscribe-mail'];
        	$fields = [
        		'email' => $email
        	];
        	$subscriber = new Subscriber();
        	$subscriber->addNewSubscriber($fields);
        	Router::redirect('home/newsletterSubscription/'.$email);
        }

        public function newsletterSubscriptionAction($email=''){
        	$params['email'] = $email;
        	$this->view->render('home/newsletterSubscription', $params);
        }

        public function getViewDetailsForSearch($keywords, $a){
            $products = [];
            $keys = [];
            foreach ($keywords as $key) {
                $key = '%' . $key . '%';
                array_push($keys, $key);
            }

            $params = [
                'column' => 'name',
                'keys' => $keys,
                'limit' => $a . ',6'
            ];

            $details = $this->_db->search('product', $params);

            foreach ($details as $row){
                $image=new Image('tailor_product_image');
                $images=$image->getImage($row);
                $row->images = $images;
            }
            $noOfRows=count($details);

            return [$details,$noOfRows];
        }

        public function searchAction($a='0'){
        	$keywords = explode(" ", $_GET["keywords"]);
        	$a = $_GET['page'];
        	$product=new Product('product');
			$details = $product->getViewDetailsForSearch($keywords, $a);
			$param=$details[0];
			$noOfProducts =$details[1];
			$params=array($param,$a,$noOfProducts,'All Products', $_GET["keywords"]);
			$this->view->render('home/searchProductList',$params);
        }

        public function sendMessageAction(){
        	$mediator = new messageMediator();
        	$mediator->setSubscribers();

        	$subject = 'Tailor Mate received a new message from a user';

        	date_default_timezone_set('Asia/Colombo');
        	$message = '<p>Tailor Mate received a new message from a user.</p>';
			$message .= '<p>Following are the details</p>';
			$message .= '<p> Date & Time: ' . date("Y-m-d H:i:s") . '</p>';
			$message .= '<p> Name: ' . $_POST['name'] . '</p>';
			$message .= '<p> Email: ' . $_POST['email'] . '</p>';
			$message .= '<p> Phone Number: ' . $_POST['number'] . '</p>';
			$message .= '<p> Message: ' . $_POST['message'] . '</p>';

			$content = $message;

        	$mediator->sendMessage($subject, $content);

        	Router::redirect('home/contactUsSuccess');

        }

        public function contactUsSuccessAction(){
        	$this->view->render('home/contactUsSuccess');
        }

    public function editProductAction($pr_id){
        $product = new Product();
        $product_details = $product->findById($pr_id);
        $color = new Color();
        $colors = $color->getColorByproductID($pr_id);
        $fields = [
            "name" => $product_details->name,
            "description" =>$product_details->description,
            "price" => $product_details->price,
            "sub_category_id" => $product_details->sub_category_id,
            "material" => $product_details->material
        ];
        $db = DB::getInstance();
        $main_category = $db->find('category');
        $sub_category = $db->find('sub_category');
        $mes = new Measurement("product_measurement");
        $measurements = $mes->getMeasurementByID($pr_id);
        $params = [$sub_category,$measurements,$main_category,$fields,$colors];

        $color = new Color();
        if($_POST){
//                dnd($_POST);
            $product->editProduct($pr_id);
            $color->editColor($_POST["colors"],$pr_id);
            $mes->editMesurement($pr_id,$_POST["newMeasurements"]);
        }

        $this->view->render('home/EditProduct',$params);
    }

    public function removeProductAction($pr_id){
        $product = new Product();
        $product_details = $product->findById($pr_id);
        $vendor_id = $product_details->vendor_id;
        $product->removeProduct($pr_id);
        $measurement = new Measurement("product_measurement");
        $measurement->deleteMeasurements($pr_id);
        $color = new Color();
        $color->deleteColor($pr_id);

//        $this->VendorPageAction($vendor_id);
    }

    public function changeActiveStatusAction(){
        $data=json_decode($_POST['new']);
        $pr_id = $data[0];
        $status = $data[1];
        $product = new Product();
        $product->changeActiveStatus($pr_id,$status);

    }

    public function pageNotFoundAction(){
    	$this->view->render('home/404');
    }



}