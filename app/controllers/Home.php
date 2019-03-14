<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){

			// $db=DB::getInstance();
			// $contacts=$db -> findFirst('users');
			// $params = array();
			// array_push($params, $contacts);
			$this->view->render('home/index');
		}

		public function ProductListAction($a){

			$db=DB::getInstance();
			$limit = array('limit'=>$a.',2');
			$details = $db->find('products',$limit);			
			$params = array();
			array_push($params,$details);
			array_push($params,$a);
			$b = (count($db->find('products')));
			array_push($params,$b);

			$this->view->render('home/ProductList',$params);
		}

		public function Men_s_Baseball_T_ShirtAction(){
			$this->view->render('home/Men_s_Baseball_T_Shirt');
		}


        public function addProductAction(){

            $this->view->render('home/addProduct');
        }
	}