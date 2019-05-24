<?php 
abstract class Message{
	protected $productName, $approval, $from, $tp, $shop_name, $notification, $tailorName, $customerName, $message;

	public function __construct($_notification){
		$this->notification=$_notification;
		$this->setMessage();
		// var_dump($this->notification->id);
	}

	public abstract function getMessage();

	public abstract function setMessage();

	// public abstract function sendNoification($product_id,$to,$from,$status, $type);

	public function setProductName(){
		$this->productName= '<a style="font-weight: 400;"php href="'.PROOT.'home/productView/'.$this->notification->pr_id.'"><b>'.$this->notification->pr_name.'</b></a>';
	}

	public function setStatus(){

		if ($this->notification->status==1)
         	 $this->approval='<b>accepted</b>';
        else
          	$this->approval= '<b>rejected</b>';

	}


}

 ?>