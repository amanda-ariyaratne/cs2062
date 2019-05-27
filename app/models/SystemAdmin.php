<?php 
	class SystemAdmin extends User{
		public function __construct($u=''){
			parent::__construct($u);
		}

		public function sendNewsletter($subject, $content){
			$mediator = new NewsletterMediator();
			$mediator->setSubscribers();
			$mediator->sendMessage($subject, $content);
		}

		public function receiveMessage($subject, $content){
			$to = $this->email;

			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From: TailorMate <tailormatemail@gmail.com>' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

			if(mail($to, $subject, $content, $headers)){
				return true;
			}else{
				return false;
			}
		}

		public function getAllAdmins(){
			$user = new User();
			$params = [
                'conditions' => 'role = ?',
                'bind' => ['1']
            ];
            $users = $user->find($params);
            $admins = [];
            foreach ($users as $user) {
            	$admin = new SystemAdmin();
            	foreach (get_object_vars($user) as $key => $value) {
            		$admin->$key = $value;
            	}
            	array_push($admins, $admin);
            }
            return $admins;
		}

	}

 ?>