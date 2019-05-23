<?php 
	class NotificationController extends Controller{
		
			
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function oldNotificationAction(){
			$id=currentUser()->id;
			$noti=new Notification('notification');

			$old=$noti->getSeenNoti($id);

			if (count($old)>0){
				$param=array('status'=>'true', 'old'=>$old);
				
			}
			else{
				$param=array('status'=>'false');
			}
		}

		public function newNotificationAction(){
			$id=currentUser()->id;
			$noti=new Notification('notification');

			$new=$noti->getNewNoti($id);

			if (count($new)>0){			
				echo json_encode(array('status'=>'true','new'=> $new ));
			}

			else{
				echo json_encode(array('status'=>'false'));
			}
		}

		public function removeNotificationAction($id_not){	
			$id=currentUser()->id;
			$noti=new Notification('notification');

			//give the id of the notification not the user//
			/////////fix this/////////////
			$noti->remove($id);
		}

		public function updateSeenNotificationAction(){	
			$data=json_decode($_POST["new"]);

			// $id=currentUser()->id;
			// $noti=new Notification('notification');

			// foreach ($data as $element){
			// 	$noti->updateAsSeen($element->id);				
			// }

			echo json_encode(array('status'=> '1'));
			
		}

	}

 ?>