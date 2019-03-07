<?php

	class Home extends Controller {

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){

			$this->view->render('home/index');
		}

		public function ProductListAction(){
			$this->view->render('home/ProductList');
		}

		public function Men_s_Baseball_T_ShirtAction(){
			$this->view->render('home/Men_s_Baseball_T_Shirt');
		}

	}