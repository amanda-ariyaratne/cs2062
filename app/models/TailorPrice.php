<?php 
	class TailorPrice extends Model{

		public function __construct($table=''){
			$table='tailor_price';
			parent::__construct($table);			
		}

		public function addTailorPrice($product_id, $tailor_id, $price){

			$price_id=$this->checkTailor($product_id, $tailor_id);

			if ($price_id!=null){
				$fields=[
					'price'=>$price
				];
				return $this->update($price_id, $fields);
			}
			else{
				$fields=[
					'product_id'=> $product_id,
					'tailor_id'=>$tailor_id,
					'price'=>$price
				];
				return $this->insert($fields);
			}
		}

		public function checkTailor($product_id, $tailor_id){
			$conditions=['conditions'=>['product_id=?', 'tailor_id=?'], 'bind'=>[$product_id, $tailor_id]];

			$id=$this->findFirst($conditions)->id;
			return $id;
		}

		public function getTailorPrice($product_id, $tailor_id){
			$conditions=['conditions'=>['product_id=?', 'tailor_id=?'], 'bind'=>[$product_id, $tailor_id]];
			return $this->findFirst($conditions)->price;
		}
	}

 ?>