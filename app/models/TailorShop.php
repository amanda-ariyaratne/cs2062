<?php 
	class TailorShop extends Model{
		private $table;

		public function __construct($_table){
			$this->table=$_table;
			parent::__construct($_table);	
		}

		public function getShops($offset,$range){
			$limit = array('limit'=>$offset.','.$range);
			return $this->find($limit);
		}

		public function noOfShops(){
			return count($this->find());
		}
	}
 ?>