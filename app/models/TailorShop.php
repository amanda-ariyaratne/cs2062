<?php 
	class TailorShop extends Model{

		public function __construct($table=''){
			$table='tailor_shop';
			parent::__construct($table);	
		}

		public function getShops($offset,$range){
			$limit = array('limit'=>$offset.','.$range);
			return $this->find($limit);
		}

		public function noOfShops(){
			return count($this->find());
		}

		public function getStoreByVendor($id){
			return $this->findFirst(['conditions'=>"vendor_id = ?" , 'bind'=>[$id]]);
		}

		public function updateStoreDetails($id, $fields){
			$this->update($id, $fields);
			Router::redirect('account/storeDetails');
		}

	}
 ?>