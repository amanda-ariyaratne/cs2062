<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$db=DB::getInstance();
			$this->view->render('home/index');
		}

		public function CategoryItemAction($id){
			$db=DB::getInstance();
			$condition=array('conditions'=> 'sub_category = ?','bind'=>[$id]);
			$limit = array('limit'=>$id.',3');
			$details=$db->findFirst('products',$condition,$limit);
		

			$temp= array($db->findFirst('products',$condition));
			$noOfProducts = count($temp[0]);

			$params=array($details,$id,$noOfProducts);
			$this->view->render('home/ProductList',$params);
		}

		public function ProductListAction($a){

			$db=DB::getInstance();
			$limit = array('limit'=>$a.',6');
			$details = $db->findFirst('products',$limit);
			
			$temp= array($db->findFirst('products'));
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
        	$categories = $db->find('sub_categories');
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

            $this->view->render('home/ProductRequest');
        }



	}