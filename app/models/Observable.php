<?php 
interface Observable{
	public function setChanged();
        public function notifyObservers($product_id,$tailor_id,$customer_id);  
        public function addObserver($obj); 
}

 ?>