<?php 
	class TailorResponse extends Model{

		public function __construct($table=''){
			$table='tailor_response';
			parent::__construct($table);
		}

		public function getCoversation($product_id, $tailor_id){
			$conditions=array('conditions'=>['product_id = ?', 'tailor_id=?'], 'bind' => [$product_id, $tailor_id]);
			$responses=$this->find($conditions);
			$this->setRespondents($responses);
			return $responses;
		}

		public function getResponses($product_id,$sender,$seen){
			$conditions=array('conditions'=>['product_id = ?', 'seen=?', 'sender=?'], 'bind' => [$product_id,$seen, $sender]);
			$responses=$this->find($conditions);

			$responses=$this->getUniqueResponses($responses,$product_id,$sender,$seen);

			return $responses;
		}

		public function getResponsesByCustomer($product_id,$tailor_id, $sender,$seen){
			$conditions=array('conditions'=>['product_id = ?', 'tailor_id=?', 'sender=?', 'seen=?'], 'bind' => [$product_id, $tailor_id, $sender, $seen]);
			$responses=$this->find($conditions);

			$this->setRespondents($responses);

			return $responses;
		}

		public function setRespondents($responses){
			foreach ($responses as $response){
				$sender=$response->sender;
				if ($sender=='t'){
					$user_id=$response->tailor_id;
				}
				elseif ($sender=='c'){
					$user_id=$this->getOwner($response->product_id);
				}
				// get full name of respondent //
				$respondant=$this->getRespondentName($user_id);			
				$response->senderName=$respondant;
				$response->sender_id=$user_id;
				// get sender 
				$response->avatar=$this->getAvatar($user_id);
			}
		}

		public function getUniqueResponses($responses,$product_id,$sender,$seen){
			$tailors=[];
			foreach($responses as $response){
				array_push($tailors,$response->tailor_id);
			}
			$tailors=array_unique($tailors);

			$new_responses=[];
			foreach($tailors as $tailor_id){
				$new_response=end($this->getResponsesByCustomer($product_id,$tailor_id, $sender,$seen));

				array_push($new_responses, $new_response);
			}
			return $new_responses;
		}

		public function getRespondentName($id){
			$user=new User();
			$user_details=$user->getName($id);
			return $user_details;
		}

		public function getOwner($product_id){
			$custom_request=new CustomRequest();
			return $custom_request->getOwner($product_id);
		}

		public function getAvatar($user_id){
			$user=new User();
			return $user->getAvatar($user_id);
		}

		public function setResponse($product_id, $sender, $tailor_id, $response){
			$fields=[
					'product_id'=>$product_id,
					'sender'=>$sender,
					'tailor_id'=>$tailor_id,
					'response'=>$response					
			];
			var_dump($fields);

			return $this->insert($fields);
		}

		public function updateResponses($product_id,$sender){

			$new_responses=$this->getResponses($product_id,$sender,'0');
			
			$fields=['seen'=>'1'];
			foreach ($new_responses as $new) {
				$this->update($new->id,$fields);
			}		
		}
	}
 ?>