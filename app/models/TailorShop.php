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

		public function getAvatar($tailor_id){
			$conditions=['conditions'=>'user_id=?','bind'=>[$tailor_id]];
			$avatar=$this->findFirst($conditions)->logo;
			return $avatar;

		}

		public function updateStoreDetails($id, $fields){
			$this->update($id, $fields);
		}

		public function addTailorShop($fields){
			$this->insert($fields);
		}

	}
 ?>