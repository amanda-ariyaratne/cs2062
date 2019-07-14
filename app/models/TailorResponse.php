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

		public function getNewResponses($product_id){
			$conditions=array('conditions'=>['product_id = ?', 'seen=?', 'sender=?'], 'bind' => [$product_id,'0', 't']);
			$responses=$this->find($conditions);

			$this->setRespondents($responses);

			//have to get the unique vale
			return $responses;
		}

		public function getTailorNewResponses($product_id, $tailor_id){
			$conditions=array('conditions'=>['product_id = ?', 'tailor_id=?', 'seen=?'], 'bind' => [$product_id, $tailor_id, $customer_id, '0']);
			$responses=$this->find($conditions);

			$this->setRespondents($responses);

			return $responses;
		}

		public function getOldResponses($product_id){
			$conditions=array('conditions'=>['product_id = ?', 'seen=?', 'sender=?'], 'bind' => [$product_id,'1', 't']);
			$responses=$this->find($conditions);

			$this->setRespondents($responses);

			return $responses;
		}

		public function getTailorOldResponses($product_id, $tailor_id){
			$conditions=array('conditions'=>['product_id = ?', 'tailor_id=?', 'seen=?'], 'bind' => [$product_id, $tailor_id, $customer_id, '1']);
			$responses=$this->find($conditions);

			$this->setRespondents($responses);

			return $responses;
		}

		public function setRespondents($responses){
			foreach ($responses as $response){
				$id=$response->tailor_id;

				// get full name of respondent //
				$respondant=$this->getRespondent($id);
				$fullName=$respondant->first_name.' '.$respondant->last_name;
				$response->tailor=$fullName;
				$response->tailor_id=$respondant->id;

				// get tailor shop
				$tailor_shop=new TailorShop();
				$response->avatar=$tailor_shop->getAvatar($id);
			}
		}

		public function getRespondent($id){
			$conditions=array('conditions'=>['id = ?'], 'bind' => [$id]);
			$user=new User();
			return $user->findFirst($conditions);
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
	}
 ?>