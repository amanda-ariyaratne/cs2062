<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class Customer_Order extends Model{
		private $current, $productArray = array();

		public function __construct($a=''){
			$table = 'customer_order';
			parent::__construct($table);
			
			//$current = new Adding_customer_information();
		}

		public function calculateCheckoutPrice($item_array){
			$updated_items = array();
			$new_array = array();

			$total = 0;
			foreach ($item_array as $item) {
				$item['item_total'] = $item['price']*$item['quantity'];
				$total += $item['item_total'];
				array_push($new_array, $item);
			}
			array_push($updated_items, $new_array);
			$updated_items['total'] = $total;
			return $updated_items;
		}

		public function change(){
			$current->changeState($this);
		}
	}










////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	abstract class OrderState{
		abstract function changeState($order);
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class Pending extends OrderState{
		function changeState($order){

		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class Manufacturing extends OrderState{
		function changeState($order){
			
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class Delivering extends OrderState{
		function changeState($order){
			
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class FinishedDelivering extends OrderState{
		function changeState($order){
			
		}
	}