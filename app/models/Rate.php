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
			$product = new Product();
			$all_products = $product->find(array('conditions' => 'vendor_id = ?', 'bind' => [$tailor_id]));
			$tailor_rating = 0;
			$tailor_rating_count = 0;
			foreach ($all_products as $product) {
				$ratings = $this->find(array('conditions' => 'product_id = ?', 'bind' => [$product->id]));
				$tailor_rating_count += count($ratings);
				foreach ($ratings as $rating) {
					$tailor_rating += $rating->rate;
				}
			}
			if ($tailor_rating == 0) {
				return 0;
			}

			return $tailor_rating/$tailor_rating_count;
		}

	}