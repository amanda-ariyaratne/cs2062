<?php 
interface Observable{
	public function setChanged();
        public function notifyObservers();  
        public function addObserver($obj); 
}

 ?>