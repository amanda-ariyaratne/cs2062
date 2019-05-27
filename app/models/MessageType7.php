<?php 
class MessageType7 extends Message{

	public function __construct($notification){
		parent::__construct($notification);
	}

	public function setMessage(){
			$this->setProductName();
			$this->setStatus();
			$this->message='Your order '.$this->productName.' is on the way!';
	}

	public function getMessage(){
			return $this->message;
	}
}

 ?>