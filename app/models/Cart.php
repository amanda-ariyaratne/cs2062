<?php

	class Cart extends Model{

		public function __construct($table='cart'){
			parent::__construct($table);
		}

		public function getPaymenteDetails($u_id){
			$payments = array();

			$details = $this->find(array('conditions' => 'customer_id = ?' , 'bind' => [$u_id]));

			if(count($details)!=0){
				foreach ($details as $item) {
					$field = [
						'product_id' => $item->product_id,
						'quantity'   => $item->quantity
					];
					array_push($payments, $field);
				}
			}
			return $payments;
		}



	}
