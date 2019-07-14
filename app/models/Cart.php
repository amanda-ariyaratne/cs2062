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
						'quantity'   => $item->quantity,
                        'vendor_id'  => $item->vendor_id,
                        'color'      => $item->color,
                        'image_path' => $item->image_path
					];
					array_push($payments, $field);
				}
			}
			return $payments;
		}


        public function addItem($val){
            $fields = [
                "product_id" => $val["product_id"],
                "product_name" => $val["name"],
                "customer_id" => $val["user_id"],
                "quantity" => $val["quantity"],
                "price" => $val["price"],
                "image_path" => $val["image"],
                "vendor_id" => $val["vendor_id"],
                "color" => $val["color"]
            ];
            
            $details = $this->find(array('conditions' => 'customer_id = ?', 'bind' => [$val["user_id"]]));
            if(count($details)!= 0 ){
                $vendor_id = $details[0]->vendor_id;
//                dnd($vendor_id);
                if($val["vendor_id"]==$vendor_id){
                    $this->insert($fields);
                    return true;
                }
                else{
                    return false;
                }
            }

            else{

                $this->insert($fields);
                return true;
            }
        }


        public function getCartItems($o_id){
            $cartItems = [];
            $details = $this->find(array('conditions' => 'customer_id = ?', 'bind' => [$o_id]));
            $tailor = new User();

            if (count($details) != 0) {
                foreach ($details as $item) {
                    $tailor_details = $tailor->findById($item->vendor_id);
//                    dnd($tailor_details);
                    $tailor_name = $tailor_details->first_name;
                    $fields = [
                        "cart_id" => $item->id,
                        "product_id" => $item->product_id,
                        "name" => $item->product_name,
                        "quantity" => $item->quantity,
                        "price" => $item->price,
                        "customer_id" => $o_id,
                        "image" => $item->image_path,
                        "color" => $item->color,
                        "vendor_name" => $tailor_name

                    ];

                    array_push($cartItems, $fields);
                }
//                dnd($cartItems);
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

        public function getCartItemCount($customer_id){
            return count($this->find(array('conditions' => 'customer_id = ?', 'bind' => [$customer_id])));
        }
    }

