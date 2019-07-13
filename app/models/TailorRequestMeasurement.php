<?php

class TailorRequestMeasurement extends Measurement{

	public function getMeasutmentBy_CustomerID_and_ProductID($u_id , $p_id){
		$measurement_details = $this->find(array('conditions' => ['customer_id = ?' , 'product_id = ?'], 'bind' => [$u_id,$p_id]));
		return $measurement_details;
	}
}
