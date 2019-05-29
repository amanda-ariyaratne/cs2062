<?php 
class MessageType5 extends Message{

	public function __construct($notification){
		parent::__construct($notification);
	}

	public function setMessage(){
			$this->setProductName();
			$this->setStatus();
			$this->message='Your order '.$this->productName.' has been '.$this->approval.'.';
	}

	public function getMessage(){
			return $this->message;
	}
}

 ?>