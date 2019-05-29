<?php

	class Review extends Model{

		public function __construct($a=''){
			$table = 'review';
			parent::__construct($table);
		}

		public function findByProductID($p_id){
			return $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$p_id]));
		}

		public function deleteByID($id){
			$this->delete($id);
		}
	}