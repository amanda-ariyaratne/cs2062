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
			$condition = array('conditions'=>['seen = ?','_to = ?'],'bind'=> [ 0 , $id]);
			
			return $this->find($condition);			
		}

		
		public function getSeenNoti( $id ){			
			//seen notifications
			$condition =['seen'=>'0'];
			$this->update($id, $condition);
		}

		public function remove($id){
			$this-> delete($id);
		}

		public function updateAsSeen($id){
			$condition=['seen'=>'1'];
			$this->update($id, $condition);
		}
	}
 ?>