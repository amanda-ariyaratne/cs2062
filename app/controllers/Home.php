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

			//$params=array($details,$a,$noOfProducts);
			

			$params=array($details,$a,$noOfProducts);


			$this->view->render('home/CustomerRequests',$params);
		}

		public function ProductRequestAction(){

        	$db=DB::getInstance();        	
        	
        	if($_POST){
            	
        		$fields=[
        			'pr_name'=> $_POST["design-name"],
        			'description'=> $_POST["Design-Description"],
        			'location' => $_POST["postal-code"],
        			'color' => $_POST["color-picker"],
        			'due_date' => $_POST["due-date"] 
        		];    

        		//$db->insert('customer_requests',$fields);  

        		if (!($db->find('customer_requests'))) {
        			$id = 1;
        		} else {
        			$id=count($db->find('customer_requests'));
        		}
        		

        		$images=($_FILES["fileUpload"]);
        		
        		for ($x = 0; $x <= 10; $x++){
        			$image=$images["name"][$x];
        			//dnd($images);
	        		$imageTable=[
	        			'image_path'=>$image,
	        			'product_id'=>$id
	        		];

	        		$db->insert('images',$imageTable);  

	        		$alertMsg='
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">			  
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

						<div class="container">
							<div class="alert alert-success fade in">    
						    	<strong>Success!</strong> This alert box could indicate a successful or positive action.
						  	</div>
						</div>';





	        		$target_dir=$_SERVER['DOCUMENT_ROOT'].PROOT.'asset/images/productrequest';
	        		$Itype=$images["type"][$x];
	        		
	        		// $target_file=$target_dir.'/'.'request_Image'.$id.'.jpg';
	        		//dnd($target_file);
	        		// if(move_uploaded_file($image,$target_file)){
	        		// 	dnd('success');
	        		// } else {
	        		// 	dnd('failure');
	        		// }
        		}       		

        		Router::redirect('home/ProductRequest',array($alertMsg));

        	}

        	$this->view->render('home/ProductRequest'); 
            
        }


        public function productViewAction(){
        	
			$db=DB::getInstance();
			//load product table
			$product_array = array('condition'=>'id = ?' , 'bind' => [1]);
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


		public function ProductListAction($a='0'){

			$db=DB::getInstance();
			$limit = array('limit'=>(3*$a-3).',3');
			$details = $db->find('product_features',$limit);
			//dnd($details);
			foreach ($details as $row){

				$pr_sub_id=$row->sub_category_id;
							
				$condition=array('cond0. itions'=> 'product_id = ?','bind'=>[$pr_sub_id]);
				

				$image_details = $db->find('images',$condition);
				$imageList=array();
				
				$images = array();
				$row->images = $images;

				if (is_array($image_details)) {
					foreach ($image_details as $imagePath){
						array_push($row->images,$imagePath->image_path);
					}
				}
					
			}

			//dnd($details);
			$temp= array($db->find('product_features'));
			//dnd($temp);
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