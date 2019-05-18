<?php 
	class NotificationController extends Controller{
		protected $id,$noti;
		
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
			$id=currentUser()->id;
			$noti=new Notification('notification');

		}

		public function oldNotificationAction(){
			
			$old=$noti->getSeenNoti($id);

			if (count($old)>0){
				$param=array('status'=>'true', 'old'=>$old);
				
			}
			else{
				$param=array('status'=>'false');
			}
		}

		public function newNotificationAction(){

			$new=$noti->getNewNoti($id);

			if (count($new)>0){			
				echo json_encode(array('status'=>'true','new'=> $new ));
			}

			else{
				echo json_encode(array('status'=>'false'));
			}
		}

		public function removeNotificationAction($id_not){	
			//give the id of the notification not the user//
			/////////fix this/////////////
			$noti->remove($id);
		}

		public function updateSeenNotificationAction(){	

			$data=json_decode($_POST["new"]);

			foreach ($data as $element){
				$noti->updateAsSeen($element->id);
			}

			echo json_encode(array('status'=> $data[1]->id));
		}

	}

 ?>