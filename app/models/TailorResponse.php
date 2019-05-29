<?php 
	class TailorResponse extends Model{

		public function __construct($table=''){
			$table='tailor_response';
			parent::__construct($table);
		}

		public function getResponse($product_id, $tailor_id){
			$conditions=array('conditions'=>['product_id = ?', 'tailor_id = ?'], 'bind' => [$product_id, $tailor_id]);

			return $this->find($conditions);
		}

		public function setResponse($product_id, $tailor_id, $response){
			$fields=[
					'product_id'=>$product_id,
					'tailor_id'=>$tailor_id,
					'response'=>$response
			];

			$this->insert($fields);
		}
	}
 ?>