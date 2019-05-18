<?php 
	
	class CustomRequestController extends Controller{

		public function __construct($controller,$action){
			parent::__construct($controller,$action);
		}
		
		public function CustomerRequestViewAction($a){
			$customRequest = new CustomRequest('custom_request');
			$details= $customRequest->getViewDetails($a);
			$param=$details[0];
			$noOfProducts =$details[1];
			

			$params=array($param,$a,$noOfProducts,'Custome Requests');

			$this->view->render('home/CustomerRequests',$params);
		}

		public function ProductRequestAction(){
			$customRequest = new CustomRequest('custom_request');
			$params=array('Product Request');
			if($_POST){
				$customRequest-> createRequest();

			
				$_SESSION['alert']='
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">			  
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
				<div class="container">
					<div class="alert alert-success fade in">    
				    	<strong>Success!</strong> You have successfully added a CUSTOM REQUEST!
				  	</div>
				</div>';	

				Router::redirect('home/ProductRequest',$params);
			}

        	$this->view->render('home/ProductRequest',$params);

        }

        public function acceptAction(){
        	$customRequest = new CustomRequest('custom_request');
			//get value
			$id=json_decode($_POST['id'])->id;	

			$customRequest->acceptRequest($id);

			//pass value
			echo json_encode(array('status'=> $id));

		}

		public function removeAction(){
			$customRequest = new CustomRequest('custom_request');
			//get id
			$id=json_decode($_POST['id'])->id;	
			
			$customRequest->rejectRequest($id);

			//pass value
			echo json_encode(array('status'=> '0'));

		}
}