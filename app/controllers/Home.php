<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}



		public function indexAction(){
			$this->view->render('home/index');
		}



		public function ProductListAction($a){
			$db=DB::getInstance();
			$limit = array('limit'=>$a.',2');
			$details = $db->find('products',$limit);			
			$params = array();
			array_push($params,$details);
			array_push($params,$a);

			$this->view->render('home/ProductList',$params);
		}



		public function Men_s_Baseball_T_ShirtAction(){
			$this->view->render('home/Men_s_Baseball_T_Shirt');
		}



        public function addProductAction(){
            $this->view->render('home/addProduct');
        }



		public function loginAction(){
			$this->view->render('register/login');
		}



		public function productViewAction(){
			$db=DB::getInstance();
			//load product table
			$product_array = array('condition'=>'id = ?' , 'bind' => [1]);
			$details = $db->find('products_1',$product_array);			
			$params = array();
			array_push($params,$details);

			//load review table
			$db2=DB::getInstance();

			$review_array = array('condition' => 'product_id = ?' , 'bind' => [1]);
			$review_details = $db2->findfirst('review',$review_array);

			$review_params = array();
			array_push($review_params,$review_details);
			array_push($params,$review_params);
			//dnd($params);

			$this->view->render('home/productView',$params);
		}



	}