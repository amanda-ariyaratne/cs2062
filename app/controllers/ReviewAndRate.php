<?php

	class ReviewAndRate extends Controller{
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$this->view->setLayout('default');
			$this->load_model('User');
		}



		public function addReviewAction(){

			if ($_POST) {
				//dnd($_POST);
				$user = new User();
				$user = $user->currentLoggedInUser();

				if ($user!=null) {
					//create objects of review and rate
					$review_obj = new Review();
					$rate_obj = new Rate();

					//add reviews to review table
					$fields = [
						"content" => $_POST["body"],
						"product_id" => $_POST["product_id"],
						"yes_no" => $_POST["yes-no"],
						"user_id" => $user->id
					];
					$review_obj->insert($fields);

					//add rating to rates table
					$fields_ratings = [
						"rate" => $_POST["star"],
						"product_id" => $_POST["product_id"],
						"user_id" => $user->id
					];
					$rate_obj->insert($fields_ratings);
					
					$p_id = $_POST["product_id"];
					Router::redirect('home/productView/'.$p_id);
				}
				else{
					Router::redirect('account/login');
				}

			} else {
				$params = [];
			}
			$this->view->render('home/productView',$params);
		}



		public function calculateStarRating(){
			$p_id = 3;

			$rate_obj = new Rate();

			$starAvg = $rate_obj->calculateAvg($p_id);
		}
	}