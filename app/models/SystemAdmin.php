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

		public function getCurrentAdmin(){
			$user = new User();
			$params = [
                'conditions' => 'id = ?',
                'bind' => [currentUser()->id]
            ];
            $user = $user->findFirst($params);
		}

	}

 ?>