<?php

	class Register extends Controller{

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('Users');
		}

		public function registerAction(){
			
			if ($_POST) {
				$db = DB::getInstance();
				$fields = [
					"first_name" => $_POST["first_name"],
					"last_name" => $_POST["last_name"],
					"email" => $_POST["email"],
					"password" => password_hash($_POST["password"], PASSWORD_DEFAULT)
				];
				$db->insert('users', $fields);
			}
			$this->view->render('register/register');
		}

	}