<?php

	class Color extends Model{

		public function __construct($a=''){
			$table = 'color';
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
	}