<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class CustomerOrder extends Model  implements Observable{
		private $_current, $_state_obj;

		public function __construct($table='customer_order'){
			$table = $table;
			parent::__construct($table);
		}

		public function notifyObservers($product_id,$to,$from,$status, $type){
			
		}

        public function addObserver($obj){
        	
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

		public function getOrderList($id){
			return $this->find(array('conditions'=>'user_id = ?' , 'bind' => [$id]));
		}

		public function getOrderDetails($o_id){
			return $this->findFirst(array('conditions'=>'id = ?' , 'bind' => [$o_id]));
		}

		//state behavioral pattern
		public function setState($state,$_state_obj){
			$this->_state_obj = $_state_obj;
			$this->_current = $state;
		}
		public function changeState(){
			$this->_current -> changeState($this);
		}
		public function confirm(){
			$a = $this->_state_obj->update($this->id ,['state_confirmed'=>'1']);

			dnd('confirmed');
		}		
		public function manufacturing(){
			$a = $this->_state_obj->update($this->id ,['state_manufacturing'=>'1']);
			dnd($a);
		}		
		public function delivering(){
			$a = $this->_state_obj->update($this->id ,['state_delivering'=>'1']);
			dnd($a);
		}		
		public function delivered(){
			$a = $this->_state_obj->update($this->id ,['state_delivered'=>'1']);
			dnd($a);
		}
	}









//States as an object
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	abstract class OrderState{
		abstract function changeState($order);

		public function confirm($order){
			$order->confirm();
		}public function manufacturing($order){
			$order->manufacturing();
		}public function delivering($order){
			$order->delivering();
		}public function delivered($order){
			$order->delivered();
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateInitial extends OrderState{
		function changeState($order){
			$this->confirm($order);
			$order->setState(new StateConfirmed());
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateConfirmed extends OrderState{
		function changeState($order){
			$this->manufacturing($order);
			$order->setState(new StateManufacturing());
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateManufacturing extends OrderState{
		function changeState($order){
			$this->delivering($order);
			$order->setState(new StateDelivering());
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateDelivering extends OrderState{
		function changeState($order){
			$this->delivered($order);
			$order->setState(new StateDelivered());
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateDelivered extends OrderState{
		function changeState($order){
			dnd('final state');
		}
	}