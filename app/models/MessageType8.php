<?php 
class MessageType8 extends Message{

	public function __construct($notification){
		parent::__construct($notification);
	}

	public function setMessage(){
			$this->setProductName();
			$this->setStatus();
			$this->message='Order '.$this->productName.' is delivered';
	}

	public function getMessage(){
			return $this->message;
	}
}

 ?>