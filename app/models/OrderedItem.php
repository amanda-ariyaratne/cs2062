<?php

	class OrderedItem extends Model{

		public function __construct($_table='ordered_item'){
			$_table = $_table;
			parent::__construct($_table);
		}

		public function getItemList_by_Order_ID($o_id){
			$order_obj =  $this->find(array('conditions'=>'order_id = ?' , 'bind' => [$o_id]));

			$params = [];
			foreach ($order_obj as $key => $order) {
				$orderdetais = [];
				$orderdetais = [
					'id' => $order->id,
					'product_id' => $order->product_id,
					'name' => $order->name,
					'quantity' => $order->quantity,
					'price' => $order->price,
					'item_total' => $order->item_total,
					'color' => $order->color,
					'image_path' => $order->image_path
				];	
				array_push($params,$orderdetais);
			}

			return $params;
		}

		
	}