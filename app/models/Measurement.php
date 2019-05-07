<?php

	class Measurement extends Model{

		public function __construct($table='measurement'){
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


	}