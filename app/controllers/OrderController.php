<?php
	
	class OrderController extends Controller{

		public function customerInformationAction($user_id = '1'){
			//load user email
			$user = new User();
			$user = $user->currentLoggedInUser();

			if($user!=null){
				$params = array();
				array_push($params,$user);

				$params = $this->addToParams($params, $user_id);
				//dnd($params);
				$this->view->render('Order/CustomerInformation',$params);
			}else{
					Router::redirect('register/login');
			}
		}





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
						'night_phone_a'     => '+94',
						'night_phone_b'     => substr($_POST['phone'], -9)
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

					$params = $this->addToParams($params, $_POST['user_id']);

					$this->view->displayErrors = $validation->displayErrors();
					$this->view->render('Order/CustomerInformation',$params);
				}
			}
			else{
				Router::redirect('OrderController/CustomerInformation');
			}	
		}







		public function completeOrderAction(){
			//dnd($_POST);

			// For test payments we want to enable the sandbox mode. If you want to put live
			// payments through then this setting needs changing to `false`.
			$enableSandbox = true;

			// Database settings. Change these for your database configuration.
			// $dbConfig = [
			//     'host' => 'localhost',
			//     'username' => 'wageesha',
			//     'password' => 'secret',
			//     'name' => 'example_database'
			// ];

			// PayPal settings. Change these to your account details and the relevant URLs
			// for your site.
			$paypalConfig = [
			    'email' => 'selleraccount2062@gmail.com',
			    'return_url' => 'http://localhost/cs2062/OrderController/orderSuccess',
			    'cancel_url' => 'http://localhost/cs2062/OrderController/CustomerInformation',
			    'notify_url' => 'http://localhost/cs2062/OrderController/CustomerInformation'
			];

			$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';


			// Check if paypal request or response
			if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

			    // Grab the post data so that we can set up the query string for PayPal.
			    // Ideally we'd use a whitelist here to check nothing is being injected into
			    // our post data.
			    $data = [];
			    foreach ($_POST as $key => $value) {
			        $data[$key] = stripslashes($value);
			    }
			   
			    // Set the PayPal account.
			    $data['business'] = $paypalConfig['email'];

			    // Set the PayPal return addresses.
			    $data['return'] = stripslashes($paypalConfig['return_url']);
			    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
			    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);


			    // Add any custom fields for the query string.
			    //$data['custom'] = USERID;

			    //dnd($data);
			    
			    // Build the query string from the data.
			    $queryString = http_build_query($data);

			    // Redirect to paypal IPN
			    header('location:' . $paypalUrl . '?' . $queryString);
			    exit();

			} else {
			    // Handle the PayPal response.

				// Create a connection to the database.
				// $db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);
				dnd('wrong output in payment method');
				// Assign posted variables to local data array.
				$data = [
				    'item_name' => $_POST['item_name'],
				    'item_number' => $_POST['item_number'],
				    'payment_status' => $_POST['payment_status'],
				    'payment_amount' => $_POST['mc_gross'],
				    'payment_currency' => $_POST['mc_currency'],
				    'txn_id' => $_POST['txn_id'],
				    'receiver_email' => $_POST['receiver_email'],
				    'payer_email' => $_POST['payer_email'],
				    'custom' => $_POST['custom'],
				];

				// We need to verify the transaction comes from PayPal and check we've not
				// already processed the transaction before adding the payment to our
				// database.
				if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {
				    if (addPayment($data) !== false) {
				        // Payment successfully added.
				    }
				}
			}
		}













		private function addToParams($params , $user_id){
			//load cart table and get item details
			$cart = new Cart();
			$cart_details = $cart->getPaymenteDetails($user_id);

			if(count($cart_details)!=0){
				//load product table and get item prices
				$product = new Product('product');
				$product_details = $product->getProductPriceByID($cart_details);
				
				//calculate price 
				$order = new Customer_Order();
				$order_details = $order->calculateCheckoutPrice($product_details);
				array_push($params, $order_details);
			}
			else{
				array_push($params, []);
			}

			$params['user_id'] = $user_id;
			//dnd($params);
			return $params;
		}



       ////////////////////////////////////////////////// code from git

		function verifyTransaction($data) {
			global $paypalUrl;

			$req = 'cmd=_notify-validate';
			foreach ($data as $key => $value) {
				$value = urlencode(stripslashes($value));
				$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
				$req .= "&$key=$value";
			}

			$ch = curl_init($paypalUrl);
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
			curl_setopt($ch, CURLOPT_SSLVERSION, 6);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
			$res = curl_exec($ch);

			if (!$res) {
				$errno = curl_errno($ch);
				$errstr = curl_error($ch);
				curl_close($ch);
				throw new Exception("cURL error: [$errno] $errstr");
			}

			$info = curl_getinfo($ch);

			// Check the http response
			$httpCode = $info['http_code'];
			if ($httpCode != 200) {
				throw new Exception("PayPal responded with http code $httpCode");
			}

			curl_close($ch);

			return $res === 'VERIFIED';
		}

		/**
		 * Check we've not already processed a transaction
		 *
		 * @param string $txnid Transaction ID
		 * @return bool True if the transaction ID has not been seen before, false if already processed
		 */
		function checkTxnid($txnid) {
			global $db;

			$txnid = $db->real_escape_string($txnid);
			$results = $db->query('SELECT * FROM `payments` WHERE txnid = \'' . $txnid . '\'');

			return ! $results->num_rows;
		}

		/**
		 * Add payment to database
		 *
		 * @param array $data Payment data
		 * @return int|bool ID of new payment or false if failed
		 */
		function addPayment($data) {
			global $db;

			if (is_array($data)) {
				$stmt = $db->prepare('INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime) VALUES(?, ?, ?, ?, ?)');
				$stmt->bind_param(
					'sdsss',
					$data['txn_id'],
					$data['payment_amount'],
					$data['payment_status'],
					$data['item_number'],
					date('Y-m-d H:i:s')
				);
				$stmt->execute();
				$stmt->close();

				return $db->insert_id;
			}

			return false;
		}


		public function orderSuccessAction(){
			$this->view->render('Order/OrderSuccess');
		}


	}