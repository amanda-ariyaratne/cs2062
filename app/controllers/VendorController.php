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

        public function VendorProductViewAction($p_id){

            $params = array();


            //load product table
            $product = new Product('product');
            $product_obj = $product->findById($p_id);



            //load sub categories table and instert sub category name into product
            $sub_category_obj = new SubCategory();
            $sub_category_details = $sub_category_obj->findByID($product_obj->sub_category_id);
            $product_obj->sub_category_name = $sub_category_details->name;

            //load categories table and instert main category name -> product_obj
            $category_obj = new Category();
            $category_details = $category_obj->findByID($sub_category_details->main_id);
            $product_obj->main_category_name = $category_details->name;
            array_push($params,$product_obj);

            //add product images array - inster to params
            $img = new Image('tailor_product_image');
            array_push($params,$img->getImage($product_obj->id));

            //load review table
            $review_object = new Review();
            $review_details = $review_object->findByProductID($p_id);

            //load rates table
            $rate_obj = new Rate();
            if(count($review_details)!=0){
                $starAvg = $rate_obj->calculateAvg($p_id);
                $product_obj->starRating = $starAvg;
            }


            if(!empty($review_details)){
                $rate_details = $rate_obj->findByProductID($p_id);
            }

            //new user object
            $user_obj = new User();

            //add vendor name
            $product_obj->vendor = $user_obj->findByUserID($product_obj->vendor_id);

            //add rete and user detail
            $reverse_reviews = array();
            $reverse_rates = array();

            if(!empty($review_details)){
                $reverse_reviews = array_reverse($review_details);
                $reverse_rates = array_reverse($rate_details);

                //load user table
                $i = 0;
                foreach($reverse_reviews as $review){
                    $user = $user_obj->findByUserID($review->user_id);
                    $review->user_fname = $user->first_name;
                    $review->user_lname = $user->last_name;

                    //add rating to review
                    $review->rate = $reverse_rates[$i]->rate;
                    $i ++;

                }
            }
            array_push($params,$reverse_reviews);


            //add more products by vendor
            $related_products = $product->findBy_vendorId($product_obj->vendor_id , 4 , $p_id);
            if(is_array($related_products)){
                $image_array = $img->getMoreImagesByVendor($related_products);
            }
            array_push($params, $image_array);

            //load product colors
            $color = new Color();
            $params['colors'] = $color->getColorByproductID($p_id);

            //load product measurements
            $measurement = new Measurement('product_measurement');
            $params['measurements'] = $measurement->getMeasurementByID($p_id);

            $params['vendor_id'] = $product_obj->vendor_id;

            //dnd($params);

            $this->view->render('TailorView/VendorProductView',$params);
        }




    }