<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$this->view->render('home/index');
		}

		public function loginAction(){
			$this->view->render('home/login');
		}

		public function ProductListAction(){
			$this->view->render('home/ProductList');
		}

		public function testAction(){
			$this->view->render('home/test');
		}

	}