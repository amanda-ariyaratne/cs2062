<?php 
	
	class CustomRequestController extends Controller{

		
		public function CustomerRequestViewAction($a){

			$viewRequest = new CustomRequest('custom_request');

			$details= $viewRequest-> getViewDetails($a);
			$param=$details[0];
			$noOfProducts =$details[1];
			

			$params=array($param,$a,$noOfProducts,'Custome Requests');

			$this->view->render('home/CustomerRequests',$params);
		}

		public function ProductRequestAction(){

			$params=array('Product Request');
			if($_POST){
				$customRequest=new CustomRequest('custom_request');
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
			//get value
			$id=json_decode($_POST['id'])->id;	
			
			$customRequest=new CustomRequest('custom_request');
			$value=$customRequest->acceptRequest($id);

			//pass value
			echo json_encode(array('status'=> $id));

		}

		public function removeAction(){
			//get id
			$id=json_decode($_POST['id'])->id;	
			
			$customRequest=new CustomRequest('custom_request');
			$customRequest->rejectRequest($id);

			//pass value
			echo json_encode(array('status'=> '0'));

		}
}