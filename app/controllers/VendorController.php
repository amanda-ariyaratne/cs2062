<?php 
	
	class VendorController extends Controller{

		public function __construct($controller,$action){
			parent::__construct($controller,$action);
		}
		
		
		public function AllVendorsAction($no){

			$tailorshop=new Tailorshop('tailor_shop');
			
			$details = $tailorshop->getShops((6*$no-6),6);			
			$noOfProducts = $tailorshop->noOfShops();

			$params=array($details,$no,$noOfProducts,'Tailor shops');

			$this->view->render('home/AllVendors',$params);
		}

		public function VendorPageAction($a){
			$product=new Product('product');
			$details=$product->getPageVendor($a);

			$param=$details[0];
			$noOfProducts =$details[1];			

			$params=array($param,$a,$noOfProducts,$param[0]->vendorName);
			$this->view->render('TailorView/VendorPage',$params);


			//get vendor name
		}

}