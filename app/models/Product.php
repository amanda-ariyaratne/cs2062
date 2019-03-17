<?php

	class Product extends Model {
		protected $_db, $_table;


		public function __construct($products=""){
			$table = "products";
			parent::__construct($table);


		}
	}

