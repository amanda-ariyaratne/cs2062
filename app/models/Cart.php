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


        public function addItem($val){

//            $detail = $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$val["product_id"]]));
//            if(count($detail)!=0){
//                $fields = [
//                    "quantity" => $val["quantity"]+$detail["quantity"],
//                    "price" => $val["price"]+$detail["price"],
//                ];
//                $this->update($detail["id"],$fields);
////                dnd("yes");
//            }
//            else {

            $fields = [
                    "product_id" => $val["product_id"],
                    "product_name" => $val["name"],
                    "customer_id" => $val["user_id"],
                    "quantity" => $val["quantity"],
                    "price" => $val["price"],
                    "image_path" => $val["image"]

                ];
                $this->insert($fields);
//            }
        }


        public function getCartItems($o_id)
        {
            $cartItems = [];
            $details = $this->find(array('conditions' => 'customer_id = ?', 'bind' => [$o_id]));

            if (count($details) != 0) {
                foreach ($details as $item) {
                    $fields = [
                        "cart_id" => $item->id,
                        "product_id" => $item->product_id,
                        "name" => $item->product_name,
                        "quantity" => $item->quantity,
                        "price" => $item->price,
                        "customer_id" => $o_id,
                        "image" => $item->image_path
                    ];
                    array_push($cartItems, $fields);
                }
                return $cartItems;
            }
        }

        public function remove($cart_id){
            $this->delete($cart_id);

        }

        public function emptyCart($u_id){
            $details = $this->find(array('conditions' => 'customer_id = ?', 'bind' => [$u_id]));
            if (count($details) != 0) {
                foreach ($details as $item) {
                    $this->delete($item->id);
                }
            }
        }
    }

