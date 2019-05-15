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


        public function addItem($val)
        {
            $fields = [
                "product_id" => $val["product_id"],
                "product_name" => $val["name"],
                "customer_id" => $val["user_id"],
                "quantity" => $val["quantity"],
                "price" => $val["price"],
                "image_path" => $val["image"]

            ];

            $this->insert($fields);
        }


        public function getCartItems($o_id)
        {
            $cartItems = [];
            $details = $this->find(array('conditions' => 'customer_id = ?', 'bind' => [$o_id]));

            if (count($details) != 0) {
                foreach ($details as $item) {
                    $fields = [
                        "product_id" => $item->product_id,
                        "name" => $item->product_name,
                        "quantity" => $item->quantity,
                        "price" => $item->price
                    ];
                    array_push($cartItems, $fields);
                }
            }
            return $cartItems;
        }

        public function remove($i,$userId)
        {
            $fields = [
                "product_id" => $i,
                "customer_id" => $userId
            ];

            $obj = $this->findFirst($fields);
//            dnd($obj);

        }

        public function emptyCart($userId){



        }
    }

