<?php

class OrderedItemMeasurement extends Measurement{

	public function getMeasurements_by_orderedItemID($id){
		$mesurements =  $this->find(array('conditions'=>'ordered_item_id = ?' , 'bind' => [$id]));

		$params = [];
		foreach ($mesurements as $key => $mes) {
			$mesArray = [
						'measurement_type' => $mes->measurement_type,
						'measurement' => $mes->measurement
						];

			array_push($params , $mesArray);
		}

		return $params;
	}

}