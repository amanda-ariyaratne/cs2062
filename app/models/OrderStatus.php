<?php

	class OrderStatus extends Model{

		public function __construct($table='order_status'){
			$table = $table;
			parent::__construct($table);
		}


		public function getOrderStatusByID($o_id){
			$order_obj =  $this->findFirst(array('conditions'=>'id = ?' , 'bind' => [$o_id]));
			$order = [
				 "state_confirmed" => $order_obj->state_confirmed,
				 "state_manufacturing" => $order_obj->state_manufacturing,
				 "state_delivering" => $order_obj->state_delivering,
				 "state_delivered" => $order_obj->state_delivered
			];
			return $order;
		}


		public function updateStatus($data){
			$o_id = '5';
			$order = new CustomerOrder();
			$order_obj = $order->findById($o_id);
			$state_obj = $this->findById($o_id);

			$states = [
				'StateConfirmed' => $state_obj->state_confirmed,
				'StateManufacturing' => $state_obj->state_manufacturing,
				'StateDelivering' => $state_obj->state_delivering,
				'StateDelivered' => $state_obj->state_delivered
			];
			foreach ($states as $key => $value) {
				if ($value==1) {
					$last_updated_state = $key;
				}
			}
			$order_obj->setState(new $last_updated_state(),$state_obj);
			$order_obj->changeState();

			// if($data['status']==1){
			// 	$order->changeState();
			// 	$a = $this->update($o_id,['state_confirmed'=>'1']);
			// 	dnd($a);
			// }			
			// else if($data['status']==2){
			// 	$order->changeState();
			// 	$a = $this->update($o_id,['state_confirmed'=>'1','state_manufacturing'=>'1']);
			// 	dnd($a);
			// }			
			// else if($data['status']==3){
			// 	$order->changeState();
			// 	$a = $this->update($o_id,['state_confirmed'=>'1' , 'state_manufacturing'=>'1' , 'state_delivering'=>'1']);
			// 	dnd($a);
			// }			
			// else if($data['status']==4){
			// 	$order->changeState();
			// 	$a = $this->update($o_id,['state_confirmed'=>'1' , 'state_manufacturing'=>'1' , 'state_delivering'=>'1' , 'state_delivered'=>'1']);
			// 	dnd($a);
			// }
		}
	}