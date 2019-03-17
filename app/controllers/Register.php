<?php

	class Register extends Controller{

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('User');
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

		public function loginAction(){
			$validation = new Validate();

			if($_POST){
				$validation->check($_POST,[
					'username' => [
						'display' => "Username",
						'required' => true
					],
					'password' => [
						'display' => 'Password',
						'required' => true,
						'min' => 6
					]
				]);

				if($validation->passed()){
					$username = $_POST['username'];
					$user = $this->UserModel->findByUsername($username);
					dnd($user);
					if($user && password_verify(Input::get("password") , $user->password)){
						$remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;

						$user->login($remember);

						Router::redirect('');
					}
					else{
						$validation->addError("There is an error with your username or password.");
					}
				}

			}

			$this->view->displayErrors = $validation->displayErrors();

			$this->view->render('register/login');
		}




		// public function logoutAction(){
		// 	//dnd(currentUser());/////////////////
		// 	if(currentUser()){
		// 		currentUser()->logout();
		// 	}
			
		// 	Router::redirect('register/login');
		// }

	}