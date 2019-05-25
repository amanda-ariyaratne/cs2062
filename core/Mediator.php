<?php

	interface Mediator{
		public function sendMessage($subject, $content);
		public function setSubscribers();
	}

?>