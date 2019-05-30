<?php 
class MessageType4 extends Message{

	public function __construct($notification){
		parent::__construct($notification);
	}

	public function setMessage(){
			$this->setProductName();
			$this->setStatus();
			$this->setCustomerName();
			$this->message='You have a new order from '.$this->customerName.' for the product '.$this->productName.'.';
	}

	public function getMessage(){
			return $this->message;
	}

	public function setCustomerName(){
			$this->customerName='<a style="font-weight: 400;" href="'.PROOT.'TailorView/VendorPage/'.$this->notification->_from.'"><b>'.$this->notification->from_name.'</b></a>';
	}

}

 ?>