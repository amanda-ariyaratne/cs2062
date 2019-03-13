<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$db = DB::getInstance();
			$records = $db->findFirst('test', [
				'conditions' => "id = ?",
				'bind' => ['1'],
				'order' => "description",
				'limit' => 5
			]);

			$this->view->render('home/index');
		}

		public function loginAction(){
			$this->view->render('home/login');
		}

		public function ProductListAction(){
			$this->view->render('home/ProductList');
		}

		public function addProductAction(){
			$this->view->render('home/addProduct');
		}

	}