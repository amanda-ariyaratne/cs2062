<?php 
	/**
	 * 
	 */
	class Notification extends Model
	{

		public function __construct($table=''){
			$table='notification';
			parent::__construct($table);
		}

		public function createNotification($product_id,$to,$from,$status, $type){
		
			$fields=['_to'=>$to,
					 '_from'=>$from,
					 'pr_id'=>$product_id,
					 'type'=>$type,
					 'status'=> $status
					];

			$this->insert($fields);	
		}

		public function updateClass($product_id,$to,$from,$status, $type){
			$this->createNotification($product_id,$to,$from,$status, $type);
		}

		public function getNewNoti( $id ){
			//unseen notifications
			$condition = array('conditions'=>['seen = ?','_to = ?'],'bind'=> [ '0' , $id]);	
			$list=$this->find($condition);		

			if (count($list)>0){
				foreach($list as $row){
					// dnd($row->pr_id);
					if ($row->type==1){
						$product=new CustomRequest();
						$row->pr_name=$product->findByID($row->pr_id)->pr_name;
					}

					elseif ($row->type==2 && $row->type==3 && $row->type==4)
					{
						$product=new Product();
						$row->pr_name=$product->findByID($row->pr_id)->name;
					}

					elseif($row->type==5 && $row->type==6 && $row->type==7 && $row->type==8){
						$row->pr_name=$row->pr_id;					
					}
					
					$tailorShop=new TailorShop();
					$row_new=$tailorShop->findById($row->_from);
					$row->tailor_shop=$row_new->name;

					$user=new User();
					$new_row=$user->findByUserID($row->_from);
					$row->from_name=$new_row->first_name.' '.$new_row->last_name;

					
					$row->message=$this->getMessage($row, $row->type);
					// var_dump($row->message);
				}
			}	
			
			return $list;
		}

		public function getMessage($row, $type){
			if ($type=='1'){
				$message=new MessageType1($row);
			}

			elseif ($type=='2'){
				$message=new MessageType2($row);
			}

			elseif ($type=='3'){
				$message=new MessageType3($row);
			}

			elseif ($type=='4'){
				$message=new MessageType4($row);
			}

			elseif ($type=='5'){
				$message=new MessageType5($row);
			}

			elseif ($type=='6'){
				$message=new MessageType6($row);
			}

			elseif ($type=='7'){
				$message=new MessageType7($row);
			}

			elseif ($type=='8'){
				$message=new MessageType8($row);
			}

			return $message->getMessage();

		}


		public function getSeenNoti( $id ){			
			//seen notifications
			$condition =array('conditions'=>['seen = ?','_to = ?'],'bind'=> [ '1' , $id]);
			$list= $this->find($condition);

			if (count($list)>0){
				foreach($list as $row){

					if ($row->type==1){
						$product=new CustomRequest();
						$row->pr_name=$product->findByID($row->pr_id)->pr_name;
					}

					elseif ($row->type==2 && $row->type==3 && $row->type==4)
					{
						$product=new Product();
						$row->pr_name=$product->findByID($row->pr_id)->name;
					}

					elseif($row->type==5 && $row->type==6 && $row->type==7 && $row->type==8){
						$row->pr_name=$row->pr_id;					
					}
					
					$tailorShop=new TailorShop();
					$row_new=$tailorShop->findById($row->_from);
					$row->shop=$row_new->name;

					$user=new User();
					$new_row=$user->findByUserID($row->_from);
					$row->from_name=$new_row->first_name.' '.$new_row->last_name;

					$row->message=$this->getMessage($row, $row->type);
					// var_dump($row->message);
				}
			}	
			// dnd($list);
			return $list;
		}

		// public function remove($id){
		// 	$this-> delete($id);
		// }

		public function updateAsSeen($id){
			$field=['seen'=>'1'];
			$this->update($id, $field);
		}
	}
 ?>