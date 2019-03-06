<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$db = DB::getInstance();
			// $records = $db->find('test', [
			// 	'conditions' => "description = ?",
			// 	'bind' => ['testing db query'],
			// 	'order' => "description",
			// 	'limit' => 5
			// ]);
			// dnd($records);
			$this->view->render('home/index');
		}

		public function loginAction(){
			$this->view->render('home/login');
		}

		public function ProductListAction(){
			$this->view->render('home/ProductList');
		}

		public function Men_s_Baseball_T_ShirtAction(){
			$this->view->render('home/Men_s_Baseball_T_Shirt');
		}

	}