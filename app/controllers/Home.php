<?php
	class Home extends Controller {
        public $image;

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$this->view->render('home/index');
		}

		public function testAction(){
			$this->view->render('home/test');
		}


		public function AllVendorsAction($no){

			$tailorshop=new Tailorshop('tailor_shop');
			
			$details = $tailorshop->getShops((6*$no-6),6);			
			$noOfProducts = $tailorshop->noOfShops();

			$params=array($details,$no,$noOfProducts,'Tailor shops');

			$this->view->render('home/AllVendors',$params);
		}

		public function NewRequestPageAction($a){
			$product=new Product('product');
			$details=$product->getPageVendor($a);

			$param=$details[0];
			$noOfProducts =$details[1];			

			$params=array($param,$a,$noOfProducts,'New Requests');
			$this->view->render('home/NewRequestPage',$params);
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

		public function ProductListAction($a='0'){

			$product=new Product('product');
			$details=$product->getViewDetails($a);

			$param=$details[0];
			$noOfProducts =$details[1];			

			$params=array($param,$a,$noOfProducts,'All Products');
					
			
			$this->view->render('home/ProductList',$params);
		}


		public function CustomerRequestViewAction($a){

			$viewRequest = new CustomRequest('custom_request');

			$details= $viewRequest-> getViewDetails($a);
			$param=$details[0];
			$noOfProducts =$details[1];
			

			$params=array($param,$a,$noOfProducts,'Custome Requests');

			$this->view->render('home/CustomerRequests',$params);
		}


		public function ProductRequestAction(){

			$params=array('Product Request');
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

				Router::redirect('home/ProductRequest',$params);				
			}

        	$this->view->render('home/ProductRequest',$params);

        }

        public function addProductAction(){

        	$db = DB::getInstance();
        	$categories = $db->find('sub_category');
        	$params = [$categories,'AddProduct'];
        	if ($_POST) {
				$product=new Product('product');
				$product-> addProduct();

				//redirect to some page\\
				Router::redirect('home/addProduct');	
            }
            $this->view->render('home/addProduct', $params);

        }



        public function productViewAction($p_id){
        	//$p_id = 1;
        	
			$db=DB::getInstance();
			$params = array();			

			//load product table
			$product_array = array('conditions'=>'id = ?' , 'bind' => [$p_id ]);
			$product_obj = $db->findFirst('product_features',$product_array);	

			//load sub categories table and instert sub category name into product
			$sub_category_array = array('conditions' => 'id = ?' , 'bind' => [$product_obj->sub_category_id]);
			$sub_category_obj = $db->findFirst('sub_categories',$sub_category_array);
			$product_obj->sub_category_name = $sub_category_obj->name;

			//load categories table and instert main category name -> product_obj
			$main_category_conditions = array('conditions' => 'category_id = ?' , 'bind' => [$sub_category_obj->main_id]);
			$main_category_obj = $db->findFirst('categories',$main_category_conditions);
			$product_obj->main_category_name = $main_category_obj->category_name;
			array_push($params,$product_obj);

			//load images array - inster to params
			$images_array = array('conditions' => 'product_id = ?' , 'bind' => [$p_id ]);
			$images_details = $db->find('images',$images_array);
			array_push($params,$images_details);

			//load review table
			$review_array = array('conditions' => 'product_id = ?' , 'bind' => [$p_id ]);
			$review_details = $db->find('reviews',$review_array);
			$reverse_reviews = array();
			if (is_array($review_details)){
				$reverse_reviews = array_reverse($review_details);

				//load user table
				foreach($reverse_reviews as $review){
					$user_table = array('conditions' => 'id = ?', 'bind' => [$review->user_id]);
					$user = $db->findFirst('user',$user_table);
					$review->user_fname = $user->first_name;
					$review->user_lname = $user->last_name;
				}
			}
			array_push($params,$reverse_reviews);
			
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



	}