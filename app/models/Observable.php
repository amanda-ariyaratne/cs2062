<?php 
interface Observable{
        public function notifyObservers($product_id,$to,$from,$status, $type);  
        public function addObserver($obj); 
}

 ?>