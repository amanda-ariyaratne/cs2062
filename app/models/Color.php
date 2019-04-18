<?php 
	class Color extends Model{

		public function __construct($table){
			parent::__construct($table);
		}

		public function addColor($color,$pr_id,$type){
			$fields = [
                "color_code" => $_POST["color"],
                "pr_id" => $_POST["product_price"],
                "type" => $_POST["sale_price"]
            ];
			$this->insert($fields);
		}
	}
