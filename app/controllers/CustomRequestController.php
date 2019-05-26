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
			


			$params=array($param,$a,$noOfProducts,'Custom Requests');

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
        	$customRequest = new CustomRequest();
			//get value
			$id=json_decode($_POST['id']);	

			$user_id=json_decode($_POST['user_id']);

			$status=json_decode($_POST['status']);

			$conditions=['conditions'=>'id = ?', 'bind'=>[$id]];

			$details=$customRequest->findFirst($conditions);
			var_dump($id);
			if ($status=='1')
				$customRequest->acceptRequest($details->id, $user_id,$details->customer_id);
			else
				$customRequest->cancelRequest($details->id, $user_id,$details->customer_id);

			//pass value
			echo json_encode(array('status'=> $status));

		}



		//product view
		public function requestedProductViewAction($r_id){
			$params = array();

			//load customer request table and get details
			$customer_request = new CustomRequest();
			$request_obj = $customer_request->findByID($r_id);

			$params = [
				'id' => $request_obj->id,
				'customer_id' => $request_obj->customer_id,
				'pr_name' => $request_obj->pr_name,
				'description' => $request_obj->description,
				'color' => $request_obj->color,
				'location' => $request_obj->location,
				'due_date' => $request_obj->due_date
			]; 

			//load images 
			$image = new Image('custom_design_image');
			$image_obj = $image->getImage($request_obj);
			$params['images'] = $image_obj;

			//load product measurements
			// $measurement = new Measurement();
			// $params['measurements'] = $measurement->getMeasurementByID($p_id);

			//dnd($params);

			$this->view->render('home/customerRequestProductView',$params);
		}
}