<?php 

	class CustomRequestMeasurement extends Measurement{

		public function __construct($table=''){
			$table='custom_request_measurement';
			parent::__construct($table);
		}

	}
 ?>