<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$this->view->render('home/index');
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
		
		public function ProductListAction($a){
			$db=DB::getInstance();
			$limit = array('limit'=>$a.',6');
			$details = $db->find('products',$limit);
			
			$temp= array($db->find('products'));
			$noOfProducts = count($temp[0]);

			$params=array($details,$a,$noOfProducts);

			$this->view->render('home/ProductList',$params);
		}




        public function addProductAction(){

        	$this->load_model('Product');
        	            
        	$db = DB::getInstance();
        	$categories = $db->findFirst('sub_categories');
        	$params = [$categories];

        	if ($_POST) {
				// $db = DB::getInstance();

				$fields = [
					"name" => $_POST["Product_Name"],
					"description" => $_POST["Product_Description"],
					"price" => $_POST["price"],
					"category" => $_POST["category"],
				];

				// $this->Product->insert($fields);
				$db->insert('products', $fields);
			}
			 // dnd($fields);
            $this->view->render('home/addProduct', $params);

            
        }

        public function ProductRequestAction(){

        	$db=DB::getInstance();
        	
        	if($_POST){
        		$fields=[
        			"name"=> $_POST["design_name"],
        			"description"=> $_POST["Design-Description"],
        			// "image"=> $_POST["design_name"],
        			"location" => $_POST["postal code"],
        			"date" => $_POST["due date"] 
        		];    
        		$this->insert('customer_requests',$feilds);   		
        	}
            $this->view->render('home/test', $fields);
        }


		public function loginAction(){
			$this->view->render('register/login');
		}

		public function productViewAction(){
			$db=DB::getInstance();
			//load product table
			$product_array = array('condition'=>'id = ?' , 'bind' => [1]);
			$details = $db->findFirst('products_1',$product_array);			
			$params = array();
			array_push($params,$details);


			//load review table
			$db2=DB::getInstance();

			$review_array = array('condition' => 'product_id = ?' , 'bind' => [1]);
			$review_details = $db2->find('review',$review_array);  
			$reverse_reviews = array_reverse($review_details);

			$review_params = array();
			array_push($review_params,$reverse_reviews);
			array_push($params,$review_params);

			$this->view->render('home/productView',$params);
		}
	}