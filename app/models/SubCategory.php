<?php

	class SubCategory extends Model{

		public function __construct($a=''){
			$table = 'subCategory';
			parent::__construct($table);
		}

		public function findByID($id){
			return $this->findFirst(array('conditions' => 'id = ?' , 'bind' => [$id]));
		}

	}