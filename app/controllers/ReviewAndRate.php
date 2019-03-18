<?php

	class ReviewAndRate extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('User');
		}



		public function addReviewAction(){

			if ($_POST) {
				//insert to review DB
				$db2=DB::getInstance();
				$fields = [
					"username" => $_POST["username"],
					"text" => $_POST["body"],
					"product_id" => $_POST["id"],
					"yes_no" => $_POST["yes-no"]
				];

				$db2->insert('review', $fields);


				//product table
				$db=DB::getInstance();

				$integerIDs = array_map('intval', explode(',', $_POST["id"]));

				$array = array('condition'=>'id = ?' , 'bind' => $integerIDs);
				$details = $db->find('products_1',$array);			
				$params = array();
				array_push($params,$details);	


				//review table
				

				$review_array = array('condition' => 'product_id = ?' , 'bind' => [1]);
				$review_details = $db2->findfirst('review',$review_array);
				$reverse_review = array_reverse($review_details);

				$review_params = array();
				array_push($review_params,$reverse_review);
				array_push($params,$review_params);

				// dnd($params);
				Router::redirect('home/productView');


			} else {
				$params = [];
			}
			$this->view->render('home/productView',$params);
		}
	}