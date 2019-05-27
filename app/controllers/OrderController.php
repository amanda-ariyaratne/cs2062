<?php
	
	class OrderController extends Controller{

		public function customerInformationAction(){
			//load user email
			$user = new User();
			$user = $user->currentLoggedInUser();

			if($user!=null){
				$params = array();
				array_push($params,$user);

				$params = $this->addToParams($params, $user->id);
				//dnd($params);
				$this->view->render('Order/CustomerInformation',$params);
			}else{
					Router::redirect('account/login');
			}
		}





		public function orderListAction(){
			$user = new User();
			$user = $user->currentLoggedInUser();

			if($user!=null){
				$params = array();
				$params['user_id'] = $user->id;

				$order = new CustomerOrder();
				$status_details = $order->getOrderList($user->id);

				//reverse order list
				$reverse_orders = array();
				if(!empty($status_details)){
					$reverse_orders = array_reverse($status_details);
				}

				$state = new OrderStatus();
				$orders = array();
				foreach ($reverse_orders as $key => $order) {
					$order_details = [
						'order_id'  => $order->id,
						'delivered' =>	$state->checkIfDelivered($order->id)
					];

					array_push($orders, $order_details)	;
				}
				$params['orders'] = $orders;

				//dnd($params);
				$this->view->render('Order/OrderList', $params);
			}else{
					Router::redirect('account/login');
			}
			
		}

		public function orderStatusAction(){
			$o_id = $_POST['order_id'];
			$user = new User();
			$user = $user->currentLoggedInUser();
			if($user!=null){
				//get order status
				$order = new OrderStatus();
				$order_status = $order->getOrderStatusByID($o_id);
				$params = ['order_status' => $order_status];

				//add ordered items
				$order_item_obj = new OrderedItem();
				$orderedItems = $order_item_obj->getItemList_by_Order_ID($o_id);
				$params['ordered_items'] = $orderedItems;

				$customerOrder = new CustomerOrder();
				$order_details = $customerOrder->getOrderDetails($o_id);
				$params['order_details'] = $order_details;
				
				//dnd($params);
				$this->view->render('Order/OrderStatus', $params);
			}
			else{
					Router::redirect('account/login');
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
						'user_id' => $_POST['user_id'],
						'email'	   => $_POST['email'],
						'f_name' => $_POST['first_name'],
						'l_name' => $_POST['last_name'],
						'address'   => $_POST['address'],
						'apartment_suite'  => $_POST['address2'],
						'city'      => $_POST['city'],
						'region'  => $_POST['province'],
						'postal_code'       => $_POST['zip'],
						'night_phone_a'     => '+94',
						'night_phone_b'     => substr($_POST['phone'], -10)
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


		private function addToParams($params , $user_id){
			//load cart table and get item details
			$cart = new Cart();
			$cart_details = $cart->getPaymenteDetails($user_id);

			if(count($cart_details)!=0){
				//load product table and get item prices
				$product = new Product('product');
				$product_details = $product->getProductPriceByID($cart_details);
				
				//calculate price 
				$order = new CustomerOrder();
				$order_details = $order->calculateCheckoutPrice($product_details);
				array_push($params, $order_details);
			}
			else{
				Router::redirect('CaertController/cart');
			}

			$params['user_id'] = $user_id;
			//dnd($params);
			return $params;
		}


		public function updateStatusAction(){
			$this->view->render('Order/updateStatus');
		}
		public function inputStatusAction($o_id=''){
			$o_id = '27';
			$order = new OrderStatus();
			$order->updateStatus($o_id);
		}









		public function orderSuccessAction(){
			$this->view->render('Order/OrderSuccess');
		}

		public function notifyAction(){
			dnd('notify url');
		}





		/////////////////////////////////////////////////////////////////////////////////////////////// paypal

		public function completeOrderAction(){

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
			    'notify_url' => 'http://localhost/cs2062/OrderController/notify'
			];

			$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';


			// Check if paypal request or response
			if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

			    // Grab the post data so that we can set up the query string for PayPal.
			    // Ideally we'd use a whitelist here to check nothing is being injected into
			    // our post data.
			    $data = [
			    	"payer_email" => $_POST["payer_email"],
			    	"first_name" => $_POST["first_name"],
			    	"last_name" => $_POST["last_name"],
			    	"night_phone_a" => $_POST["night_phone_a"],
			    	"night_phone_b" => $_POST["night_phone_b"],
			    	"address1" => $_POST["address1"],
			    	"address2" => $_POST["address2"],
			    	"city" => $_POST["city"],
			    	"zip" => $_POST["zip"],
			    	"lc" => $_POST["lc"],
			    	"cmd" => $_POST["cmd"],
			    	"item_name" => $_POST["item_name"],
			    	"item_number" => $_POST["item_number"],
			    	"amount" => $_POST["amount"],
			    	"currency_code" => $_POST["currency_code"],
			    	"submit_x" => $_POST["submit_x"],
			    	"submit_y" => $_POST["submit_y"]
			    ];
			    // foreach ($_POST as $key => $value) {
			    //     $data[$key] = stripslashes($value);
			    // }

			    $data['payer_email'] =  'buyeraccount@gmail.com';
			    // Set the PayPal account.
			    $data['business'] = $paypalConfig['email'];
			    // Set the PayPal return addresses.
			    $data['return'] = stripslashes($paypalConfig['return_url']);
			    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
			    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);


			    // Add any custom fields for the query string.
			    //$data['custom'] = USERID;

			    //dnd($data);



			    //////////////////////////////////save in customer_order
			    $customer_info = unserialize($_POST['customer_info']);
			    $payment_summary = unserialize($_POST['payment_summary']);

			    $db_customer_order_fields = [];
			    foreach ($customer_info as $key => $value) {
			        $db_customer_order_fields[$key] = stripslashes($value);
			    }
			    $db_customer_order_fields['vendor_id'] = $payment_summary[0]['vendor_id'];
			    $db_customer_order_fields['total_amount'] = $_POST['total'];

			    $customerOrder_obj = new CustomerOrder();
			    $customerOrder_obj->insert($db_customer_order_fields);

			    //////////////////////////////////save in ordered_item
			    $last_inserted_id = $customerOrder_obj->lastInsertedID();

			    //dnd($payment_summary);
			    foreach ($payment_summary as $order_key => $order) {
			    	$db_order_item_fields = [];
				    foreach ($order as $item_key => $item) {
				        $db_order_item_fields[$item_key] = stripslashes($item);
				    }
				    $db_order_item_fields['order_id'] = $last_inserted_id;
				    //dnd($db_order_item_fields);
				    $orderedItems_obj = new OrderedItem();

				    $orderedItems_obj->insert($db_order_item_fields);
			    }

			   	////////////////////////////////////save order status
			   	$db_order_status_fields = [
			   		'id' => $last_inserted_id,
			   		'state_confirmed' => '1'
			   	];
			   	$order_status_obj = new OrderStatus();
			   	$order_status_obj->insert($db_order_status_fields);

			  	$cart_obj = new Cart();
			  	$cart_obj->emptyCart($customer_info['user_id']);

			    //dnd('done');


			    // Build the query string from the data.
			    $queryString = http_build_query($data);
			    //dnd($queryString);
			    // Redirect to paypal IPN
			    header('location:' . $paypalUrl . '?' . $queryString);
			    exit();

			} else {
			    // Handle the PayPal response.

				// Create a connection to the database.
				// $db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);
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
				dnd($data);
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


		function checkTxnid($txnid) {
			global $db;

			$txnid = $db->real_escape_string($txnid);
			$results = $db->query('SELECT * FROM `payments` WHERE txnid = \'' . $txnid . '\'');

			return ! $results->num_rows;
		}


		function addPayment($data) {
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



	}