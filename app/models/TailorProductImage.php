<?php 
	class TailorProductImage extends Image{
		public function __construct(){
			$table = 'tailor_product_image';
			parent::__construct($table);
		}
	}
 ?>