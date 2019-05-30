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



		public function addColor($colors,$pr_id){
            if($colors!=null) {
                for ($i = 0; $i < count($colors); $i++) {
                    $fields = [
                        "color_code" => $colors[$i],
                        "pr_id" => $pr_id
//                "type" =>
                    ];
                    $this->insert($fields);
                }
            }
		}

        public function editColor($colors,$pr_id){
            $this->deleteColor($pr_id);
            $this->addColor($colors,$pr_id);
        }

        public function deleteColor($pr_id){
            $color_details =  $this->find(array('conditions' => 'pr_id = ?' , 'bind' => [$pr_id]));
            if(count($color_details)!=null){
                foreach ($color_details as $color) {
                    $id = $color->id;
                    $this->delete($id);
                }
            }

        }
	}

