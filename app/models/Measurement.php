<?php

	class Measurement extends Model{

		public function __construct($table){
			parent::__construct($table);
		}

		public function getMeasurementByID($p_id){
			$measurement_details =  $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$p_id]));
			$measurements = array();

			if(count($measurement_details)!=null){
				foreach ($measurement_details as $measurement) {
					array_push($measurements, $measurement->name);
				}
			}
			return $measurements;
		}

		public function getMeasurementForTView($p_id){
			$measurement_details =  $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$p_id]));

			return $measurement_details;
		}


		public function addNewMeasurement($pr_id, $customer_id, $types, $measurements){

			// dnd($types);

			for ($i=0; $i<count($types); $i++){
				$fields=[
					'product_id'=>$pr_id,
					'customer_id'=> $customer_id,
					'measurement_type'=> $types[$i],
					'measurement'=>$measurements[$i]
				];
				
				$this->insert($fields);
			}
			

		}
		public function addMesurement($p_id,$arry){
		    foreach ($arry as $mes){
		        $fields = [
		           "product_id" => $p_id,
                   "name" => $mes
                ];
		        $this->insert($fields);
            }

        }

        public function editMesurement($p_id,$arry){
            $initial_measurements =  $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$p_id]));
            if(count($initial_measurements)!=null){
                foreach ($initial_measurements as $mes) {
                    $id = $mes->id;
                    $this->delete($id);
                }
            }

            foreach ($arry as $mes){
                $fields = [
                    "product_id" => $p_id,
                    "name" => $mes
                ];
                $this->insert($fields);
            }

        }
	}