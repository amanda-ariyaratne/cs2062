<?php

	class CustomerOrder extends Model implements Observable{
		private $_current, $_state_obj, $observers=array();

		public function __construct($table='customer_order'){
			$table = $table;
			parent::__construct($table);
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
		}public function getVendorOrderList($id){
			return $this->find(array('conditions'=>'vendor_id = ?' , 'bind' => [$id]));
		}


		public function getOrderDetails($o_id){
			return $this->findFirst(array('conditions'=>'id = ?' , 'bind' => [$o_id]));
		}

		public function check_order_for_user_id($user_id){
			$orders = $this->find(array('conditions'=>'user_id = ?' , 'bind' => [$user_id]));
			if($orders==null){return false;}
			else{return true;}
		}

		public function getUserIDs_for_OrderID($o_id){
			$order_details = $this->findFirst(array('conditions'=>'id = ?' , 'bind' => [$o_id]));
			$params = [
				'customer_id' => $order_details->user_id,
				'vendor_id'   => $order_details->vendor_id
			];
			return $params;
		}

		public function deleteLastID(){
			$this->_db->query("DELETE FROM customer_order order by id desc limit 1");
		}


		/////////////////notifications
		public function notify_call($t){
			$user_IDs = $this->getUserIDs_for_OrderID($this->id);
			$this->addObserver(new Notification());
            $this->notifyObservers('2', $user_IDs['customer_id'] , $user_IDs['vendor_id'] , $status='1', $type=$t);
		}
        public function notifyObservers($product_id,$tailor_id,$customer_id,$status ,$type){
            foreach ($this->observers as $observer){
                $observer->updateClass($product_id,$tailor_id,$customer_id,$status, $type);
            }
        }
        public function addObserver($obj){
            array_push($this->observers, $obj);
        }
        public function notifyVendor(){
        	$order_obj = $this->find(array('limit'=>1  , 'order'=>'id DESC'));
        	$notification_obj = new Notification();
        	$notification_obj->updateClass($order_obj[0]->id , $order_obj[0]->vendor_id , $order_obj[0]->user_id , '1' , '4');
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
			$this->notify_call(5);
			var_dump('confirmed');
		}		
		public function manufacturing(){
			$a = $this->_state_obj->update($this->id ,['state_manufacturing'=>'1']);
			$this->notify_call(6);
			var_dump('manufacturing');
		}		
		public function delivering(){
			$a = $this->_state_obj->update($this->id ,['state_delivering'=>'1']);
			$this->notify_call(7);
			var_dump('delivering');
		}		
		public function delivered(){
			$a = $this->_state_obj->update($this->id ,['state_delivered'=>'1']);
			$this->notify_call(8);
			var_dump('delivered');
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
			$order->setState(new StateConfirmed() , $order);
			Router::redirect("VendorController/vendorOrderStatus/".$order->id);
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateConfirmed extends OrderState{
		function changeState($order){
			$this->manufacturing($order);
			$order->setState(new StateManufacturing() , $order);
			Router::redirect("VendorController/vendorOrderStatus/".$order->id);
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateManufacturing extends OrderState{
		function changeState($order){
			$this->delivering($order);
			$order->setState(new StateDelivering() , $order);
			Router::redirect("VendorController/vendorOrderStatus/".$order->id);
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateDelivering extends OrderState{
		function changeState($order){
			$this->delivered($order);
			$order->setState(new StateDelivered() , $order);
			Router::redirect("VendorController/vendorOrderStatus/".$order->id);
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	class StateDelivered extends OrderState{
		function changeState($order){
			Router::redirect("VendorController/vendorOrderStatus/".$order->id);
		}
	}