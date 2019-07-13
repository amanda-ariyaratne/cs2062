<?php 
	
	class CustomRequestController extends Controller{

		protected  $customRequest;
		public function __construct($controller,$action){
			parent::__construct($controller,$action);
			$this->customRequest = new CustomRequest();


		}

		public function sendResponseAction(){
			// if (currentUser()->role==2){
				
			$product_id=$_POST['product_id'];
			$sender=json_decode($_POST['sender']);
			$tailor_id=json_decode($_POST['tailor_id']);
			$response=json_decode($_POST['response']);

			$responseObj=new TailorResponse();

			var_dump($product_id,$sender,$tailor_id,$response);

			// check weather this goes to the db or not
			$sent=$responseObj->setResponse($product_id, $sender, $tailor_id, $response);	
			echo json_encode($sent);	
			// }
		}

		public function DeleteCustomRequestAction(){
			if(currentUser()->role==3){
				$pr_id=$_POST['product_id'];
				$this->customRequest->deleteCustomRequest($pr_id);

				$customer_id=currentUser()->id;

				Router::redirect('CustomerController/CustomerPage/'.$customer_id);
			}
		}

		public function ActivationAction(){
			if(currentUser()->role==3){
				$data=$_POST['data'];
				$pr_id=$_POST['product'];
				$this->customRequest->changeActivationMode($data, $pr_id);
			}
		}

		public function CustomerRequestViewAction($a){
			if(currentUser()->role==2){
				$details= $this->customRequest->getAllCustomRequests($a);
				$param=$details[0];
				$noOfProducts =$details[1];	


				$params=array($param,$a,$noOfProducts,'Custom Requests');
				$this->view->render('CustomRequest/CustomerRequests', $params);
		
			}
		}

		public function ProductRequestAction(){

			if (currentUser()->role==3){
				$measurement_type=new MeasurementType();
				$measurement_types=$measurement_type->getAllMeasurementTypes();

				if($_POST){

					$this->customRequest->createRequest();
				
					$_SESSION['alert']='
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">			  
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
					<div class="container">
						<div class="alert alert-success fade in">    
					    	<strong>Success!</strong> You have successfully added a CUSTOM REQUEST!
					  	</div>
					</div>';	

					Router::redirect('CustomRequestController/ProductRequest');
				}


				$params=array('measurement_types'=>$measurement_types,'Product Request');

	        	$this->view->render('CustomRequest/ProductRequest',$params);

			}
			else{
				var_dump('Access denied!');
			}
        }


        public function ProductRequestEditAction($pr_id){

			if (currentUser()->role==3){
				$condition=['conditions'=>'id=?', 'bind'=> [$pr_id]];

				//get custom request row
				$details= $this->customRequest->find($condition);

				//get added measurement details
				$measurement=new Measurement('custom_request_measurement');
				$measurement_details= $measurement->getMeasurementForTView($pr_id);
				$details['measurements']=$measurement_details;

				//get image details uploaded
				$image=new Image('custom_design_image');
				$image_details=$image->getImageObject($details[0]->id);

				$details['image']=$image_details;
				$img_url_array = [];
				$img_config_array = [];

				foreach ($image_details as $image) {

					array_push($img_url_array, "<img style='height:160px' src='".PROOT."assets/images/custom_requests/".$image->path."'>");
					array_push($img_config_array, array('caption' => $image->path, 'key' => $image->id, 'url' => PROOT.'CustomRequestController/deleteCustomImage'));
				}
				$details['img_url_array'] = $img_url_array;
				$details['img_config_array'] = $img_config_array;		
						
				//get types of all measurement types
				$measurement_type=new MeasurementType();
				$measurement_types=$measurement_type->getAllMeasurementTypes();

				$params=array('product_id'=>$pr_id, 'measurement_types'=>$measurement_types, 'details'=>$details, 'Your Request', '');

				if($_POST){		
							
					$this->customRequest->updateCustomRequest($pr_id);
				
					$_SESSION['alert']='
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">			  
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
					<div class="container">
						<div class="alert alert-success fade in">    
					    	<strong>Success!</strong> Your CUSTOM REQUEST has been successfully UPDATED!
					  	</div>
					</div>';	

					Router::redirect("CustomRequestController/ProductRequestEdit/".$pr_id);
				}				

				// dnd($params['details']['measurements'][1]->measurement_type);

	        	$this->view->render('CustomRequest/ProductRequestEdit',$params);

			}
			else{
				var_dump('Access denied!');
			}

        }



        public function ApprovalAction(){
			//get value
			$id=json_decode($_POST['id']);	

			$user_id=json_decode($_POST['user_id']);

			$status=json_decode($_POST['status']);

			$conditions=['conditions'=>'id = ?', 'bind'=>[$id]];

			$details=$this->customRequest->findFirst($conditions);

			if ($status=='1'){
				$this->customRequest->acceptRequest($details->id, $user_id,$details->customer_id);

				//direct to the payment area
			}
			else
				$this->customRequest->cancelRequest($details->id, $user_id,$details->customer_id);


			//pass value
			echo json_encode(array('status'=> $status));

		}


		//product view to Tailor
		public function requestedProductViewTailorAction($r_id){
			$params = array();

			//load customer request table and get details
			
			$request_obj = $this->customRequest->findByID($r_id);			
			$params = [
				'active'=>$request_obj->active,
				'id' => $request_obj->id,
				'customer_id' => $request_obj->customer_id,
				'pr_name' => $request_obj->pr_name,
				'tailor_id'=> $request_obj->tailor_id,
				'description' => $request_obj->description,
				'status'=> $request_obj->status,
				'color' => $request_obj->color,
				'location' => $request_obj->location,
				'due_date' => $request_obj->due_date,
				'min_price'=> $request_obj->min_price,
				'max_price'=> $request_obj->max_price
			]; 


			//load images 
			$image = new Image('custom_design_image');
			$image_obj = $image->getImage($request_obj->id);
			$params['images'] = $image_obj;

			//load product measurements
			$measurement = new Measurement('custom_request_measurement');

			$params['measurements'] = $measurement->getMeasurementForTView($request_obj->id);

			$product_id= $request_obj->id;

			$tailor_id= currentUser()->id;

			$tailor_response=new TailorResponse();	
					
			$params['responses-new'] = $tailor_response->getTailorNewResponses($product_id, $tailor_id);

			$params['responses-old'] = $tailor_response->getTailorOldResponses($product_id, $tailor_id);

			$this->view->render('CustomRequest/TCustomRequestProductView',$params);
		}

		//product view to the customer
		public function requestedProductViewCustomerAction($r_id){
			$params = array();

			//load customer request table and get details
			$customer_request = new CustomRequest();
			$request_obj = $customer_request->findByID($r_id);

			$params = [
				'active'=>$request_obj->active,
				'id' => $request_obj->id,
				'customer_id' => $request_obj->customer_id,
				'pr_name' => $request_obj->pr_name,
				'status'=> $request_obj->status,
				'tailor_id'=> $request_obj->tailor_id,
				'description' => $request_obj->description,
				'color' => $request_obj->color,
				'location' => $request_obj->location,
				'due_date' => $request_obj->due_date,
				'min_price'=> $request_obj->min_price,
				'max_price'=> $request_obj->max_price
			]; 

			//load images 
			$image = new Image('custom_design_image');
			$image_obj = $image->getImage($request_obj->id);
			$params['images'] = $image_obj;

			//load product measurements
			$measurement = new Measurement('custom_request_measurement');
			$params['measurements'] = $measurement->getMeasurementForTView($request_obj->id);

			//load tailor responses
			$tailor_response=new TailorResponse();
			$params['responses-new']=$tailor_response->getNewResponses($request_obj->id);

			$params['responses-old']=$tailor_response->getOldResponses($request_obj->id);

			$tailor_shop=new TailorShop();
			$params['myAvatar']=$tailor_shop->getAvatar($request_obj->customer_id);

			$this->view->render('CustomRequest/CCustomRequestProductView',$params);
		}

		public function removeMeasurementAction(){
			$m_id=$_POST['m_id'];
			$measurement=new Measurement('custom_request_measurement');
			$measurement->deleteMeasurement($m_id);
			// echo json_encode($data);			
		}

		public function deleteCustomImageAction(){
			$id = $_POST['key'];
			$image = new Image('custom_design_image');
			$image->deleteImage($id);
			echo json_encode(array('data'=>'true'));
		}
}