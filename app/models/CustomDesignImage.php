<?php 
	class CustomDesignImage extends Image{
		public function __construct($table){
			parent::__construct($this->table);
		}
	}
 ?>