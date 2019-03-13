<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
<<<<<<< HEAD
=======

			// $db=DB::getInstance();
			// $contacts=$db -> findFirst('users');
			// $params = array();
			// array_push($params, $contacts);
>>>>>>> 2e25e8847ee31b87506f2fce5fb62e7734870a02
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

<<<<<<< HEAD
		public function loginAction(){
			$this->view->render('register/login');
		}

=======

        public function addProductAction(){
            $this->view->render('home/addProduct');
        }
>>>>>>> 2e25e8847ee31b87506f2fce5fb62e7734870a02
	}