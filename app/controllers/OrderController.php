<?php
	
	class OrderController extends Controller{

		public function customerInformationAction(){
			$o_id = 1;
			//load user email
			$user = new User();
			$user = $user->currentLoggedInUser();

			if($user!=null){
				$params = array();
				array_push($params,$user);

				$params = $this->addToParams($params, $o_id);
				//dnd($params);
				$this->view->render('Order/CustomerInformation',$params);
			}else{
					Router::redirect('account/login');
			}
		}


		// public function paymentMethodAction(){
		// 	$this->view->render('Order/PaymentMethod');
		// }




		public function addCustomerInfoAction(){
			$validation = new Validate();
			if($_POST){
				//dnd($_POST);
				$params = array();
				$validation->check($_POST,[
					'email' => [
						'display' => "Email",
						'required' => true
					],
					'first_name' => [
						'display' => "First name",
						'required' => true
					],
					'last_name' => [
						'display' => "Last name",
						'required' => true
					],
					'address' => [
						'display' => "Address",
						'required' => true
					],
					'city' => [
						'display' => "City",
						'required' => true
					],
					'phone' =>[
						'display' => "Phone number",
						'is_numeric' => true,
						'required' => true,
						'min' => 10,
						'max' => 10
					],
					'zip' =>[
						'display' => "Postal code",
						'is_numeric' => true,
						'required' => true,
						'min' => 5,
						'max' => 5
					]
				]);
				if($validation->passed()){
					$fields = [
						'email'	   => $_POST['email'],
						'f_name' => $_POST['first_name'],
						'l_name' => $_POST['last_name'],
						'address'   => $_POST['address'],
						'apartment_suite'  => $_POST['address2'],
						'city'      => $_POST['city'],
						'region'  => $_POST['province'],
						'postal code'       => $_POST['zip'],
						'phone'     => $_POST['phone']
					];
					array_push($params, $fields);

					$payment_summary = unserialize($_POST['payment_summary']);
					array_push($params, $payment_summary);

					//dnd($params);
					$this->view->render('Order/PaymentMethod',$params);
				}else{
					$user = new User();
					$user = $user->currentLoggedInUser();					
					array_push($params,$user);

					$params = $this->addToParams($params, $_POST['order_id']);

					$this->view->displayErrors = $validation->displayErrors();
					$this->view->render('Order/CustomerInformation',$params);
				}
			}
			else{
				Router::redirect('OrderController/CustomerInformation');
			}	
		}


		public function completeOrderAction(){
			header("Location: https://www.paypal.com/lk/signin?country.x=LK&locale.x=en_LK");
		}













		private function addToParams($params , $o_id){
			//load cart table and get item details
			$cart = new Cart();
			$cart_details = $cart->getPaymenteDetails($o_id);

			if(count($cart_details)!=0){
				//load product table and get item prices
				$product = new Product();
				$product_details = $product->getProductPriceByID($cart_details);
				
				//calculate price 
				$order = new Customer_Order();
				$order_details = $order->calculateCheckoutPrice($product_details);
				array_push($params, $order_details);
			}
			else{
				array_push($params, []);
			}

			$params['order_id'] = $o_id;
			//dnd($params);
			return $params;
		}


	}