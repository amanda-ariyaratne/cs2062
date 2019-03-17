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

		public function Men_s_Baseball_T_ShirtAction(){
			$this->view->render('home/Men_s_Baseball_T_Shirt');
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



	}