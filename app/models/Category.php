<?php

	class Category extends Model{

		public function __construct($a=''){
			$table = 'category';
			parent::__construct($table);
		}

		public function findByID($id){
			return $this->findFirst(array('conditions' => 'category_id = ?' , 'bind' => [$id]));
		}
	}