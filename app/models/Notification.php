<?php 
	/**
	 * 
	 */
	class Notification extends Model
	{
		public function __construct($table){
			parent::__construct($table);
		}
		public function getNewNoti( $id ){
			//unseen notifications
			$condition = array('conditions'=>['seen = ?','_to = ?'],'bind'=> [ '0' , $id]);	
			return $this->find($condition);			
		}

		
		public function getSeenNoti( $id ){			
			//seen notifications
			$condition =array('conditions'=>['seen = ?','_to = ?'],'bind'=> [ '1' , $id]);
			return $this->find($condition);
		}

		public function remove($id){
			$this-> delete($id);
		}

		public function updateAsSeen($id){
			$field=['seen'=>'1'];
			$this->update($id, $field);
		}
	}
 ?>