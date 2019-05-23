<?php 
class MessageType3 extends Message{

	public function __construct($notification){
		parent::__construct($notification);
	}

	public function setMessage(){
			$this->setProductName();
			$this->setStatus();
			$this->message='Your product '.$this->productName.' has been '.$this->approval.' to be uploaded.';
	}

	public function getMessage(){
			return $this->message;
	}

}

 ?>