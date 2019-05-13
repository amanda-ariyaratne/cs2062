<?php


	class Account extends Controller{

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
	    			$_SESSION['role'] = $_POST['role'];

				    $first_name = $_POST['first_name'];
				    $last_name = $_POST['last_name'];
				    $email = $_POST['email'];
				    $role = $_POST['role'];
				    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				    $hash = md5(rand(0,1000));

				    $user = new User();
				    if ($user->findByEmail($email) == null){
				    	$fields = [
				    		"first_name" => $first_name,
				    		"last_name" => $last_name,
				    		"email" => $email,
				    		"password" => $password,
				    		"role" => $role
				    	];
				    	$user->insert($fields);
				    	$user = $this->UserModel->findByEmail($email);
				    	$remember = true;
						$user->login($remember);
						if ($user->role == 2) {
							Router::redirect('home/vendorPage/'.$user->id);
						} else if($user->role == 3){
							Router::redirect('account/orderHistory');
						}
						

				    	//Router::redirect("register/login");
				    	//user->login();
				    } else {
				    	$_SESSION['error_email'] = "<div style='color: red;'>This user already exists</div>";
				    	$this->view->render('account/register');
				    }
				
			} else {
				$_SESSION['email'] = '';
				$_SESSION['first_name'] = '';
				$_SESSION['last_name'] = '';
				$_SESSION['role'] = '';
				$_SESSION['error_email'] = '';
				$this->view->render('account/register');
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

						if (currentUser()->role == 3) {
							Router::redirect('account/orderHistory');
						} else if(currentUser()->role == 2){
							Router::redirect('home/vendorPage/'.currentUser()->id);
						} else if(currentUser()->role == 1){
							Router::redirect('home/newProducts');
						}
						
					}
					else{
						$validation->addError("There is an error with your username or password.");
					}
				}

			}

			$this->view->displayErrors = $validation->displayErrors();

			$this->view->render('account/login');
		}

		public function myAccountAction(){
			$user = currentUser();
			if ($user->role == 2) {
				$this->view->render('account/storeDetails');
			} else if($user->role == 3){
				$this->view->render('account/details');
			}
			dnd('The requested page cannot be found.');
		}

		public function orderHistoryAction(){
			if (currentUser()->role == 3) {
				$this->view->render('account/orderHistory');
			}
			else {
				$this->view->render('home/index');
			}
		}

		public function editMyAccountAction(){

			if (currentUser()->role == 2) {
				$this->view->render('account/editStoreDetails');
			} else if(currentUser()->role == 3){
				$this->view->render('account/editDetails');
			} else {
				dnd("The page you requested is not found");
			}
		}

		public function saveEditMyAccountAction(){
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

				Router::redirect('account/myAccount');
			}	
		}


		public function logoutAction(){
			if (currentUser()) {
				currentUser()->logout();
			}
			Router::redirect('account/login');

		}

		public function forgotPasswordAction(){
			$this->view->render('account/forgotPassword');
		}

		public function sendPasswordResetEmailAction(){
			$email = $_POST["email"];
			$_SESSION['email'] = $_POST['email'];
			$user = new User();
			if ($user->findByEmail($email) != null){
			  	$user = $user->findByEmail($email);
			  	$user->sendPasswordResetEmail($email);
			  	Router::redirect('account/forgotPasswordMailSent');
			} else {
			   	$_SESSION['error_email'] = "<div style='color: red;'>This user doesn't exist.</div>";
			  	Router::redirect('account/forgotPassword');
			}
		}

		public function forgotPasswordMailSentAction(){
			$this->view->render('account/forgotPasswordMailSent');
		}

		public function resetPasswordAction(){
			$token = $_GET['token'];
			$pr = new PasswordReset();
			$pr = $pr->getPRByToken($token);
			if ($pr->isValid()){

			} else {
				Router::redirect('account/passwordRecoveryExpired');
			}
		}

		public function passwordRecoveryExpiredAction(){
			$this->view->render('account/passwordRecoveryExpired');
		}


		public function storeDetailsAction(){
			$vendor = currentUser();
			$store = new TailorShop();
			$store = $store->getStoreByVendor($vendor->id);
			$params['vendor'] = $vendor;
			$params['store'] = $store;
			$this->view->render('account/storeDetails', $params);
		}
			
		public function editStoreDetailsAction(){
			$vendor = currentUser();
			$store = new TailorShop();
			$store = $store->getStoreByVendor($vendor->id);
			$params['vendor'] = $vendor;
			$params['store'] = $store;
			$this->view->render('account/editStoreDetails', $params);
		}

		public function updateStoreDetailsAction(){
			$user = currentUser();
			$store = new TailorShop();
			$store = $store->getStoreByVendor($user->id);

			$image = ($_FILES['logo']['name']);
			$file_name = 'logo-' . date("Y-m-d-h-i-sa") . '-' . $store->id;
			$file_ext = pathinfo($image)['extension'];
			if ($file_ext != null) {
				$file_path = $file_name . '.' . $file_ext;
				$target_dir = $_SERVER['DOCUMENT_ROOT'] . PROOT.'assets/images/store_logo';
				move_uploaded_file($_FILES["logo"]["tmp_name"], $target_dir.'/'.$file_path);
			} else {
				$file_path = '';
			}
            

			$fields = [];
			if ($_POST['store_name'] != null) {
				$fields['name'] = $_POST['store_name'];
			} else {
				$fields['name'] = "";
			}
			if ($_POST['apartmentNo'] != null) {
				$fields['apartmentNo'] = $_POST['apartmentNo'];
			} else {
				$fields['apartmentNo'] = "";
			}
			if ($_POST['streetName1'] != null) {
				$fields['streetName1'] = $_POST['streetName1'];
			} else {
				$fields['streetName1'] = "";
			}
			if ($_POST['streetName2'] != null) {
				$fields['streetName2'] = $_POST['streetName2'];
			} else {
				$fields['streetName2'] = "";
			}
			if ($_POST['city'] != null) {
				$fields['city'] = $_POST['city'];
			} else {
				$fields['city'] = "";
			}
			if ($_POST['postalCode'] != null) {
				$fields['postal_code'] = $_POST['postalCode'];
			} else {
				$fields['postal_code'] = "";
			}
			if ($_POST['contactNo'] != null) {
				$fields['contactNumber'] = $_POST['contactNo'];
			} else {
				$fields['contactNumber'] = "";
			}
			if ($file_path != null) {
				$fields['logo'] = $file_path;
			}
			$store->updateStoreDetails($store->id, $fields);
		}

	}