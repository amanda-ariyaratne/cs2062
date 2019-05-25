<?php 

	class MessageMediator implements Mediator{

		private $subscribers;

		public function __construct(){
			
		}

		public function setSubscribers(){
			$admins = new SystemAdmin();
			$admins = $admins->getAllAdmins();
			$this->subscribers = $admins;
		}

		public function sendMessage($subject, $content){

			foreach ($this->subscribers as $subscriber) {
				$subscriber->receiveMessage($subject, $content);
			}
		}

	}

?>