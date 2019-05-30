<?php

	class MeasurementType extends Model{

		public function __construct($table=''){
			$table='measurement_type';
			parent::__construct($table);
		}

		public function getAllMeasurementTypes(){
			$measurement_types=$this->find();
			return $measurement_types;
		}


	}