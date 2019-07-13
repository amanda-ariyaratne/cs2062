<?php 
	class CustomerController extends Controller{

		public function __construct($controller,$action){
			parent::__construct($controller,$action);
		}

		public function CustomerPageAction($pagination){
			$user_id=currentUser()->id;
			$customRequest=new CustomRequest();
			$allRequest=$customRequest->getMyCustomRequests($user_id);
	

			$customer_name=currentUser()->first_name.' '.currentUser()->last_name;
			// dnd($customer_name);
			$noOfProducts=count($allRequest);

			$params=array($allRequest, $pagination, $noOfProducts, $customer_name );

			$this->view->render('CustomerView/CustomerPage', $params);
		}
	}

 ?>