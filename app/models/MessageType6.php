<?php 
class MessageType6 extends Message{

	public function __construct($notification){
		parent::__construct($notification);
	}

	public function setMessage(){
			$this->setProductName();
			$this->setStatus();
			$this->message='Your order '.$this->productName.' has started manufacturing process.';
	}

	public function getMessage(){
			return $this->message;
	}
}

 ?>