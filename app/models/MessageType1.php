<?php 
class MessageType1 extends Message{

	public function __construct($notification){
		parent::__construct($notification);
	}

	public function setMessage(){
			$this->setProductName();
			$this->setStatus();
			$this->setTailorName();
			$this->message='Your custom request '.$this->productName.' has been '.$this->approval.' by '.$this->tailorName.'.';
	}

	public function getMessage(){

			return $this->message;
	}

	public function setTailorName(){
			$this->tailorName='<a style="font-weight: 400;" href="'.PROOT.'home/VendorPage/'.$this->notification->_from.'"><b>'.$this->notification->tailor_shop.'</b></a>';
	}

}

 ?>