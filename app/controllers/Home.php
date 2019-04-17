<?php

	class Home extends Controller {
        public $image;

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$this->view->render('home/index');
		}


		public function CustomerRequestViewAction($a){
			$db=DB::getInstance();
			$limit = array('limit'=>$a.',6');
			$details = $db->find('customer_requests',$limit);
			
			$temp= array($db->find('products'));
			$noOfProducts = count($temp[0]);

			$params=array($details,$a,$noOfProducts);

			$this->view->render('home/CustomerRequests',$params);
		}

		public function ProductRequestAction(){

        	$db=DB::getInstance();        	
        	
        	if($_POST){
            	$images=array($_FILES["fileUpload"]["name"])[0];	
	        	$image_2=array_key_exists(1, $images);
	        	$image_3=array_key_exists(2, $images);

	        	if (!$image_2){
	        		$image_value_2="";
	        	}
	        	else{
	        		$image_value_2=$images[1];
	        	}

	        	if (!$image_3){
	        		$image_value_3="";
	        	}
	        	else{
	        		$image_value_3=$images[2];
	        	}
	        	
        		$fields=[
        			'pr_name'=> $_POST["design-name"],
        			'description'=> $_POST["Design-Description"],
        			'location' => $_POST["postal-code"],
        			'image_1' => $images[0],
        			'image_2' => $image_value_2,
        			'image_3' => $image_value_3,
        			'due_date' => $_POST["due-date"] 
        		];    
        		// dnd($fields);
        		$target_dir=$_SERVER['DOCUMENT_ROOT'].PROOT.'asset/images/productrequest';
        		$target_file=$target_dir.'/'.basename($images[0]);



        		move_uploaded_file($images[0],$target_file);
        		$db->insert('customer_requests',$fields);  

        		Router::redirect('home/CustomerRequestView/1');

        	}

        	$this->view->render('home/ProductRequest'); 
            
        }
        
        public function productViewAction(){
        	
			$db=DB::getInstance();
			//load product table
			$product_array = array('condition'=>'id = ?' , 'bind' => [2]);
			$details = $db->find('products_1',$product_array);			
			$params = array();
			array_push($params,$details);

			//load review table
			$db2=DB::getInstance();

			$review_array = array('condition' => 'product_id = ?' , 'bind' => [1]);
			$review_details = $db2->findfirst('review',$review_array);
			$reverse_reviews = array_reverse($review_details);

			$review_params = array();
			array_push($review_params,$reverse_reviews);
			array_push($params,$review_params);

			
			$this->view->render('home/productView',$params);
		}



		public function CategoryItemAction($id){
			$db=DB::getInstance();
			$condition=array('conditions'=> 'sub_category = ?','bind'=>[$id]);
			$limit = array('limit'=>$id.',3');
			$details=$db->find('products',$condition,$limit);	
			$temp= array($db->find('products',$condition));
			$noOfProducts = count($temp[0]);
			$params=array($details,$id,$noOfProducts);
			$this->view->render('home/ProductList',$params);
		}


		public function ProductListAction($a='1'){

			$db=DB::getInstance();
			$limit = array('limit'=>$a.',6');
			$details = $db->find('products',$limit);
			
			$temp= array($db->find('products'));
			$noOfProducts = count($temp[0]);

			$params=array($details,$a,$noOfProducts);

			$this->view->render('home/ProductList',$params);
		}




        public function addProductAction(){

        	$db = DB::getInstance();
        	$categories = $db->findFirst('sub_categories');
        	$params = [$categories];

        	if ($_POST) {

				$db = DB::getInstance();

                $fields = [
                    "name" => $_POST["Product_Name"],
                    "description" => $_POST["Product_Description"],
                    "price" => $_POST["product_price"],
                    "sale_price" => $_POST["sale_price"],
                    "category" => $_POST["category"],
                    "material" => $_POST["material"],
                    "image_path" => $_FILES["imagesUpload"]["name"][0],
//                    "image_path2" => $image_2_value
                ];

                $target_dir = $_SERVER['DOCUMENT_ROOT'] . PROOT.'assets/images/products';


                $target_file = $target_dir . '/' . basename($_FILES["imagesUpload"]["name"][0]);


                $target_file = ltrim($target_file,"/");
                //dnd($target_file);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


                move_uploaded_file($_FILES["imagesUpload"]["tmp_name"][0], $target_file);

                // $this->Product->insert($fields);
                $db->insert('products', $fields);
            }


            $this->view->render('home/addProduct', $params);

        }

	}