<?php 
	/**
	 * 
	 */
	class Notification extends Model
	{
		private $_table;
		public function __construct($table="notification"){
			$_table=$table;
			parent::__construct($table);
		}
		public function getNoti(){

		}

		public function setNoti(){
			
		}
	}
 ?>