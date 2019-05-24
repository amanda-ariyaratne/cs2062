<?php 
	class Subscriber extends Model{
		public function __construct(){
			$table = 'subscriber';
			parent::__construct($table);
		}


		public function addNewSubscriber($fields){
			$this->insert($fields);
		}
	}
 ?>