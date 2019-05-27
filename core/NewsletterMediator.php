<?php 

	class NewsletterMediator implements Mediator{

		private $subscribers;

		public function __construct(){
			
		}

		public function setSubscribers(){
			$subscriber = new Subscriber();
			$this->subscribers = $subscriber->find([]);
		}

		public function sendMessage($subject, $content){

			foreach ($this->subscribers as $subscriber) {
				$subscriber->receiveMessage($subject, $content);
			}
		}

	}

?>