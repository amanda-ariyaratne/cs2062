<?php 
class MessageType2 extends Message{

	public function __construct($notification){
		parent::__construct($notification);
	}

	public function setMessage(){
			$this->setProductName();
			$this->setStatus();
			$this->setTailorName();
			$this->message=$this->tailorName.' requests for the '.$this->productName.' to be uploaded.';

	}

	public function getMessage(){
			return $this->message;
	}

	public function setTailorName(){
			$this->tailorName='<a style="font-weight: 400;" href="'.PROOT.'TailorView/VendorPage/'.$this->notification->_from.'"><b>'.$this->notification->tailor_shop.'</b></a>';
	}

}

 ?>