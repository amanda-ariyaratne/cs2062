<?php 
	class SubCategory extends Model{
		private $table;

		public function __construct($_table = 'subCategory'){
			$this->table=$_table;
			parent::__construct($_table);
		}
		public function getDetails(){
			return $this->find();
		}

		public function getSubCat($condition){
			return $this->find($condition);
		}

		public function findByID($id){
			return $this->findFirst(array('conditions' => 'id = ?' , 'bind' => [$id]));
		}

	}
 ?>

