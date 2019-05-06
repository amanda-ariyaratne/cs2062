<?php

	class Color extends Model{

		public function __construct($table='color'){
			parent::__construct($table);
		}


		public function getColorByproductID($p_id){
			$color_details =  $this->find(array('conditions' => 'pr_id = ?' , 'bind' => [$p_id]));
			$colors = array();

			if(count($color_details)!=null){
				foreach ($color_details as $color) {
					array_push($colors, $color->color_code);
				}
			}

			return $colors;
			
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

