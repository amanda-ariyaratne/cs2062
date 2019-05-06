<?php

	class Cart extends Model{

	    public $cartItems = [];

        public function __construct($a = ''){
            $table = 'cart';
            parent::__construct($table);
        }

        public function getPaymenteDetails($o_id){
            $payments = array();

            $details = $this->find(array('conditions' => 'order_id = ?', 'bind' => [$o_id]));

            if (count($details) != 0) {
                foreach ($details as $item) {
                    $field = [
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity
                    ];
                    array_push($payments, $field);
                }
            }
            return $payments;
        }


        public function addItem(){
            $val = CartController::$values;
            $this->cartItems.array_push($val);


        }
    }

