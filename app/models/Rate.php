<?php

	class Rate extends Model{

		public function __construct($a=''){
			$table = 'rate';
			parent::__construct($table);
		}

		public function findByProductID($p_id){
			return $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$p_id]));
		}

		public function calculateAvg($p_id){
			$ratingArray = $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$p_id]));

			$total = 0;

			$numberOfRatings = count($ratingArray);
			if ($numberOfRatings == 0) {
				return 0;
			}
			foreach($ratingArray as $rate){
				$total+=$rate->rate;
			}

			return round($total/$numberOfRatings);
		}

		public function getRateCount($product_id){
			$ratingArray = $this->find(array('conditions' => 'product_id = ?' , 'bind' => [$product_id]));
			return count($ratingArray);
		}

		public function getTailorRating($tailor_id){
			$tailor_rating = 7.5;
			// logic for the calculations

			return $tailor_rating;
		}

	}