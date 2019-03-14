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
			$details = $db->findFirst('products',$limit);	//////findFirt vs find issue		
			$params = array();

			array_push($params,$details);
			array_push($params,$a);			

			$temp= array();
			$x=$db->findFirst('products');	//////findFirt vs find issue		
			array_push($temp,$x);
			
			$pageNo = count($temp[0]);
			array_push($params,$pageNo);

			$this->view->render('home/ProductList',$params);
		}

		public function Men_s_Baseball_T_ShirtAction(){
			$this->view->render('home/Men_s_Baseball_T_Shirt');
		}

        public function addProductAction(){

            $this->view->render('home/addProduct');
        }

	}