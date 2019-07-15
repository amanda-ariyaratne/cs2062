<?php


	class Account extends Controller{

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('User');
		}

		public function registerAction(){
			if (currentUser()) {
				$user = currentUser();
				if ($user->role == 1) {
					Router::redirect('admin/newProducts');
				} else if ($user->role == 2){
					Router::redirect('VendorController/VendorPage/'.$user->id);
				} else if ($user->role == 3) {
					Router::redirect('home/ProductList/1');
				} else if ($user->role == 4) {
					Router::redirect('account/setUpYourStore/'.$user->id);
				}
			}

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

				    	if ($role == 2) {
				    		$role = 4;
				    	}
				    	$fields = [
				    		"first_name" => $first_name,
				    		"last_name" => $last_name,
				    		"email" => $email,
				    		"password" => $password,
				    		"role" => $role
				    	];
				    	$user->insert($fields);

				    	//$user = $this->UserModel->findByEmail($email);
				    	$user = $user->findByEmail($email);

				    	// create new store
				    	// if ($role == 4) {
				    	// 	Router::redirect('account/setUpYourStore/'.$user->id);
				    	// }

				    	$remember = true;
						$user->login($remember);
						if ($user->role == 2) {
							Router::redirect('TailorView/vendorPage/'.$user->id);
						} else if($user->role == 3){
							Router::redirect('account/orderHistory');
						} else if ($user->role == 1) {
							Router::redirect('admin/newProducts');
						} else {
							Router::redirect('account/setUpYourStore/'.$user->id);
						}
						

				    	//Router::redirect("register/login");
				    	//user->login();
				    } else {
				    	$_SESSION['error_email'] = "<div style='color: red;'>This user already exists</div>";
				    	if ($role == 1) {
				    		$this->view->render('account/adminRegister');
				    	} else if($role == 2){
				    		$this->view->render('account/tailorRegister1');
				    	} else {
				    		$this->view->render('account/customerRegister1');
				    	}

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

		public function adminRegister1Action(){
			$this->view->render('account/adminRegister');
		}

		public function loginAction(){
			if (currentUser()) {
				$user = currentUser();
				if ($user->role == 1) {
					Router::redirect('admin/newProducts');
				} else if ($user->role == 2){
					Router::redirect('VendorController/VendorPage/'.$user->id);
				} else if ($user->role == 3) {
					Router::redirect('home/ProductList/1');
				} else if ($user->role == 4) {
					Router::redirect('account/setUpYourStore/'.$user->id);
				}
			}

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
							$store = new TailorShop();
							if ($store->getStoreByVendor(currentUser()->id)) {
								Router::redirect('VendorController/VendorPage/'.currentUser()->id);
							} else {
								Router::redirect('account/setUpYourStore');
							}
							
						} else if(currentUser()->role == 1){
							Router::redirect('admin/newProducts');
						}
						
					}
					else{
						$validation->addError("There is an error with your username or password.");
					}
				}

			}

			if (!currentUser()) {
				$this->view->displayErrors = $validation->displayErrors();

				$this->view->render('account/login');
			} else {
				$user = currentUser();
				if ($user->role == 1) {
					Router::redirect('admin/newProducts');
				} else if ($user->role == 2){
					$store = new TailorShop();
					if ($store->getStoreByVendor(currentUser()->id)) {
						Router::redirect('VendorController/VendorPage/'.currentUser()->id);
					} else {
						Router::redirect('account/setUpYourStore');
					}
				} else if ($user->role == 3) {
					Router::redirect('account/orderHistory');
				} else {
					Router::redirect('home/pageNotFound'); 
				}
			}

			
		}

		public function myAccountAction(){
			if (currentUser()) {
				if (currentUser()->role == 2) {
					$store = new TailorShop();
					if ($store->getStoreByVendor(currentUser()->id)) {
						$this->view->render('account/storeDetails');
					} else {
						$this->view->render('account/setUpYourStore');
					}
					
				} else if (currentUser()->role == 3) {
					$this->view->render('account/details');
				} else if (currentUser()->role == 1) {
					$this->view->render('account/storeDetails');
				}
			} else {
				Router::redirect('account/login');
			}
			
		}

		public function orderHistoryAction(){
			if (currentUser()) {
				$user = currentUser();
				if ($user->role == 3 or $user->role == 1) {
					$params = array();
					$params['user_id'] = $user->id;

					$order = new CustomerOrder();
					$status_details = $order->getOrderList($user->id);


					//reverse order list
					$reverse_orders = array();
					if(!empty($status_details)){
						$reverse_orders = array_reverse($status_details);
					}

					//update order state
					$state = new OrderStatus();
					$orders = array();
					foreach ($reverse_orders as $key => $order) {
						$order_details = [
							'order_id'  => $order->id,
							'total_amount'  => $order->total_amount,
							'created_at'  => $order->created_at,
							'delivered' =>	$state->checkIfDelivered($order->id)
						];
						array_push($orders, $order_details)	;
					}
					$params['orders'] = $orders;
					$this->view->render('account/orderHistory', $params);
				} else if ($user->role == 2){
					$store = new TailorShop();
					if ($store->getStoreByVendor($user->id)) {
						Router::redirect('home/pageNotFound');
					} else {
						Router::redirect('account/setUpYourStore');
					}
				}
				else {
					Router::redirect('home/pageNotFound');
				}
			} else {
				Router::redirect('account/login');
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
				$image = ($_FILES['logo']['name']);
				//dnd($image);
				$file_name = 'logo-' . date("Y-m-d-h-i-sa") . '-' . $store->id;
				$file_ext = pathinfo($image)['extension'];
				if ($file_ext != null) {
					$file_path = $file_name . '.' . $file_ext;
					$target_dir = $_SERVER['DOCUMENT_ROOT'] . PROOT.'assets/images/ProfilePictures';
					move_uploaded_file($_FILES["logo"]["tmp_name"], $target_dir.'/'.$file_path);
				} else {
					$file_path = '';
				}
				//dnd($file_path);
				// $fields = [
				// 	"first_name" => $_POST['first_name'],
				// 	"last_name" => $_POST['last_name'],
				// 	"dateOfBirth" => $_POST['dateOfBirth'],
				// 	"apartmentNo" => $_POST['apartmentNo'],
				// 	"streetName1" => $_POST['streetName1'],
				// 	"streetName2" => $_POST['streetName2'],
				// 	"city" => $_POST['city'],
				// 	"postalCode" => $_POST['postalCode'],
				// 	"mobileNo" => $_POST['mobileNo'],
				// 	"landLine" => $_POST['landLine']
				// ];
				if ($_POST['first_name'] != null) {
					$fields["first_name"] = $_POST['first_name'];
				}
				if ($_POST["last_name"] != null) {
					$fields["last_name"] = $_POST["last_name"];
				}
				if ($_POST['dateOfBirth'] != null) {
					$fields["dateOfBirth"] = $_POST['dateOfBirth'];
				}
				if ($_POST['apartmentNo'] != null) {
					$fields["apartmentNo"] = $_POST['apartmentNo'];
				}
				if ($_POST['streetName1'] != null) {
					$fields["streetName1"] = $_POST['streetName1'];
				}
				if ($_POST['streetName2'] != null) {
					$fields["streetName2"] = $_POST['streetName2'];
				}
				if ($_POST['city'] != null) {
					$fields["city"] = $_POST['city'];
				}
				if ($_POST['postalCode'] != null) {
					$fields["postalCode"] = $_POST['postalCode'];
				}
				if ($_POST['mobileNo'] != null) {
					$fields["mobileNo"] = $_POST['mobileNo'];
				}
				if ($_POST['landLine'] != null) {
					$fields["landLine"] = $_POST['landLine'];
				}
				if ($file_path != null) {
					$fields['logo'] = $file_path;
				}
				//dnd($fields);
				$user = new User();
				$user = currentUser();
				//dnd($user);
				$user->update($id, $fields);
				//dnd("done");
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
			if (currentUser()) {
				$user = currentUser();
				if ($user->role == 1) {
					$this->view->render('account/forgotPassword');
				} else if ($user->role == 2) {
					$this->view->render('account/forgotPassword');
				} else if ($user->role == 3){
					$this->view->render('account/forgotPassword');
				} else if ($user->role == 4) {
					$this->view->render('account/forgotPassword');
				}
			} else {
				$this->view->render('home/pageNotFound');
			}
			
		}

		public function sendPasswordResetEmailAction(){
			$email = $_POST["email"];
			//$_SESSION['email'] = $_POST['email'];
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
			$_SESSION['recovery_email'] = $pr->email;
			if ($pr->isValid()){
				Router::redirect('account/recoverPassword');
			} else {
				Router::redirect('account/passwordRecoveryExpired');
			}
		}

		public function recoverPasswordAction(){
			$this->view->render('account/recoverPassword');
		}

		public function passwordRecoveryExpiredAction(){
			$this->view->render('account/passwordRecoveryExpired');
		}

		public function updateNewPWAction(){
			$password = $_POST['password'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$hash = md5(rand(0,1000));
			$fields = [
				'password' => $password
			];
			$user = new User();
			$user = $user->findByEmail($_SESSION['recovery_email']);
			//dnd($_SESSION['recovery_email']);
			//dnd($user);
			$user->updatePassword($fields);
			Router::redirect('account/login');
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
			if ($_POST['facebook_url'] != null) {
				$fields['facebook_url'] = $_POST['facebook_url'];
			} else {
				$fields['facebook_url'] = "";
			}
			if ($_POST['google_plus_url'] != null) {
				$fields['google_plus_url'] = $_POST['google_plus_url'];
			} else {
				$fields['google_plus_url'] = "";
			}
			if ($_POST['instagram_url'] != null) {
				$fields['instagram_url'] = $_POST['instagram_url'];
			} else {
				$fields['instagram_url'] = "";
			}
			if ($_POST['youtube_url'] != null) {
				$fields['youtube_url'] = $_POST['youtube_url'];
			} else {
				$fields['youtube_url'] = "";
			}
			if ($_POST['linkedin_url'] != null) {
				$fields['linkedin_url'] = $_POST['linkedin_url'];
			} else {
				$fields['linkedin_url'] = "";
			}
			if ($file_path != null) {
				$fields['logo'] = $file_path;
			}

			$store->updateStoreDetails($store->id, $fields);
			Router::redirect('account/storeDetails');
		}

		public function customerRegister1Action(){
			$this->view->render('account/customerRegister1');
		}

		public function tailorRegister1Action(){
			$this->view->render('account/tailorRegister1');
		}

		public function setUpYourStoreAction($user_id=0){
			$user = currentUser();
			if ($user != null) {
				if ($user->role == 2 || $user->role == 4) {
					if ($_POST) {

						$store = new TailorShop();

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
						$fields['vendor_id'] = $_POST['user_id'];
						if ($_POST['store_name'] != null) {
							$fields['name'] = $_POST['store_name'];
						} else {
							$fields['name'] = "";
						}
						if ($_POST['paypal_email'] != null) {
							$fields['paypal_email'] = $_POST['paypal_email'];
						} else {
							$fields['paypal_email'] = "";
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
						if ($_POST['facebook_url'] != null) {
							$fields['facebook_url'] = $_POST['facebook_url'];
						} else {
							$fields['facebook_url'] = "";
						}
						if ($_POST['google_plus_url'] != null) {
							$fields['google_plus_url'] = $_POST['google_plus_url'];
						} else {
							$fields['google_plus_url'] = "";
						}
						if ($_POST['instagram_url'] != null) {
							$fields['instagram_url'] = $_POST['instagram_url'];
						} else {
							$fields['instagram_url'] = "";
						}
						if ($_POST['youtube_url'] != null) {
							$fields['youtube_url'] = $_POST['youtube_url'];
						} else {
							$fields['youtube_url'] = "";
						}
						if ($_POST['linkedin_url'] != null) {
							$fields['linkedin_url'] = $_POST['linkedin_url'];
						} else {
							$fields['linkedin_url'] = "";
						}
						if ($file_path != null) {
							$fields['logo'] = $file_path;
						}

						$store->addTailorShop($fields);
						//dnd($_POST['user_id']);
						$user = new User();
						$user = $user->findByUserID($_POST['user_id']);
						$params = ['role'=>2];
						// dnd($_POST);
						$user->updateRole($params);
						//dnd('done');
						if (currentUser()) {
							Router::redirect('VendorController/vendorPage/'.currentUser()->id);
						} else {
							$user = new User();
							$user = $user->findByUserID($fields['vendor_id']);

							$remember = true;
							$user->login($remember);
							if ($user->role == 2) {
								Router::redirect('VendorController/VendorPage/'.$user->id);
							} else if($user->role == 3){
								Router::redirect('account/orderHistory');
							} else if ($user->role == 1) {
								Router::redirect('admin/newProducts');
							}
						}

					}

					$params['user_id'] = $user_id;
					$this->view->render('account/setUpYourStore', $params);

				$store->addTailorShop($fields);
				//dnd($_POST['user_id']);
				$user = new User();
				$user = $user->findByUserID($_POST['user_id']);
				$params = ['role'=>2];
				// dnd($user);
				$user->updateRole($params);
				// dnd('done');
				if (currentUser()) {
					Router::redirect('VendorController/vendorPage/'.currentUser()->id);
				} else {
					$user = new User();
					$user = $user->findByUserID($fields['vendor_id']);

					$remember = true;
					$user->login($remember);
					if ($user->role == 2) {
						Router::redirect('VendorController/VendorPage/'.$user->id);
					} else if($user->role == 3){
						Router::redirect('account/orderHistory');
					} else if ($user->role == 1) {
						Router::redirect('admin/newProducts');
					}
				}

				} else if($user->role == 1 || $user->role == 3){
					Router::redirect('home/pageNotFound');
				}
					
			} else {
				Router::redirect('account/login');
			}
			
					
				
		}

	}