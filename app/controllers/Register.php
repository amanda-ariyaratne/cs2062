<?php

	class Register extends Controller{

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('User');
		}

		public function registerAction(){
			
			if ($_POST) {
				    $_SESSION['email'] = $_POST['email'];
    				$_SESSION['first_name'] = $_POST['first_name'];
	    			$_SESSION['last_name'] = $_POST['last_name'];

				    $first_name = $_POST['first_name'];
				    $last_name = $_POST['last_name'];
				    $email = $_POST['email'];
				    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				    $hash = md5(rand(0,1000));

				    $user = new User();
				    if ($user->findByEmail($email) == null){
				    	$fields = [
				    		"first_name" => $first_name,
				    		"last_name" => $last_name,
				    		"email" => $email,
				    		"password" => $password,
				    	];
				    	$user->insert($fields);

				    	Router::redirect("register/login");
				    	//user->login();
				    } else {
				    	$_SESSION['message'] = "<div style='color: red;'>This user already exists</div>";
				    	$this->view->render('register/register');
				    }
				
			} else {
				$this->view->render('register/register');
			}
			
		}

		public function loginAction(){
			$validation = new Validate();

			if($_POST){
				$validation->check($_POST,[
					'email' => [
						'display' => "Email",
						'required' => true
					],
					'password' => [
						'display' => 'Password',
						'required' => true,
						'min' => 8
					]
				]);

				if($validation->passed()){
					$email = $_POST["email"];
					$user = $this->UserModel->findByEmail($email);

					if($user && password_verify(Input::get("password") , $user->password)){
						$remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;

						$user->login($remember);

						Router::redirect('register/orderHistory');
					}
					else{
						$validation->addError("There is an error with your username or password.");
					}
				}

			}

			$this->view->displayErrors = $validation->displayErrors();

			$this->view->render('register/login');
		}

		public function userDetailsAction(){
			$this->view->render('register/details');
		}

		public function orderHistoryAction(){
			$this->view->render('register/orderHistory');
		}

		public function editDetailsAction(){
			if ($_POST) {
				$id = currentUser()->id;
				$fields = [
					"first_name" => $_POST['first_name'],
					"last_name" => $_POST['last_name'],
					"dateOfBirth" => $_POST['dateOfBirth'],
					"apartmentNo" => $_POST['apartmentNo'],
					"streetName1" => $_POST['streetName1'],
					"streetName2" => $_POST['streetName2'],
					"city" => $_POST['city'],
					"postalCode" => $_POST['postalCode'],
					"mobileNo" => $_POST['mobileNo'],
					"landLine" => $_POST['landLine']
				];

				$user = new User();
				$user = currentUser();
				$user->update($id, $fields);
				Router::redirect('register/userDetails');
			}
			$this->view->render('register/editDetails');
		}

		public function logoutAction(){
			if (currentUser()) {
				currentUser()->logout();
			}
			
			Router::redirect('register/login');
		}

	}