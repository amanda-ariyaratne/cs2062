<?php 
	class Subscriber extends Model{

		private $mediator;

		public function __construct(){
			$table = 'subscriber';
			parent::__construct($table);
		}


		public function addNewSubscriber($fields){
			$this->insert($fields);
		}

		public function receiveMessage($subject, $content){
			$to = $this->email;

			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From: TailorMate <admin@tailormate.local>' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

			if(mail($to, $subject, $content, $headers)){
				return true;
			}else{
				return false;
			}
		}

		public function deleteSubscriber($id){
			$this->delete($id);
		}
	}
 ?>