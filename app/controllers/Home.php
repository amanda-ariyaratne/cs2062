<?php

	class Home extends Controller {
        public $image;

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function indexAction(){
			$this->view->render('home/index');
		}

		public function ProductListAction($a='0'){

			$db=DB::getInstance();
			$limit = array('limit'=>(3*$a-3).',3');
			$details = $db->find('product_features',$limit);
			//dnd($details);
			foreach ($details as $row){

				$pr_sub_id=$row->sub_category_id;
				$name=$row->name;
				
				$condition=array('conditions'=> ['product_id = ?','pr_name = ?'],'bind'=>[$pr_sub_id,$name]);
				

				$image_details = $db->find('images',$condition);

				//dnd ($image_details);
				
				$imageList=array();
				

				$images = array();
				$row->images = $images;

				if (is_array($image_details)) {
					foreach ($image_details as $imagePath){
						array_push($row->images,$imagePath->image_path);
					}
				}
					
			}

			
			$temp= array($db->find('product_features'));

			$noOfProducts = count($temp[0]);

			$params=array($details,$a,$noOfProducts);

			$this->view->render('home/ProductList',$params);
		}
		public function CustomerRequestViewAction($a){


			$db=DB::getInstance();
			$a--;
			$limit = array('limit'=>$a.',6');
			$a++;
			$details = $db->find('customer_requests',$limit);
			//dnd($details[0]->id); 

			foreach ($details as $row){

				$id=$row->id;
				$name=$row->pr_name;

				$condition=array('conditions'=> ['product_id = ?','pr_name = ?'],'bind'=>[$id,$name]);	
				$image_details = $db->find('images',$condition);

				//dnd ($image_details);
				$imageList=array();
				

				$images = array();
				$row->images = $images;

				if (is_array($image_details)) {
					foreach ($image_details as $imagePath){
						array_push($row->images,$imagePath->image_path);
					}
				}
					
			}
			
			$temp= array($db->find('product_features'));

			$noOfProducts = count($temp[0]);

			$params=array($details,$a,$noOfProducts);
			//dnd($details);
			//$this->view->render('home/ProductList',$params);


			// $images=array();
			// //dnd('fgh');
			// for($x=0; $x<6; $x++){
			// 	$id=$details[$x]->id;
			// 	$name=$details[$x]->pr_name;
			// 	$condition=array('conditions'=> ['product_id = ?','pr_name = ?'],'bind'=>[$id,$name]);	

			// 	$image_details = $db->find('images',$condition);

			// 	//dnd($image_details);
			// 	//array_push($details[$x], $image_details->image_path);
				
			// }
			// dnd($details);
			// $temp= array($db->find('products'));
			// $noOfProducts = count($temp[0]);

			// //$params=array($details,$a,$noOfProducts);
			

			// $params=array($details,$a,$noOfProducts);


			$this->view->render('home/CustomerRequests',$params);
		}

		public function ProductRequestAction(){

        	$db=DB::getInstance();

        	if($_POST){
        		$fields=[
        			'pr_name'=> $_POST["design-name"],
        			'description'=> $_POST["design-Description"],
        			'location' => $_POST["postal-code"],
        			'color' => $_POST["color-picker"],
        			'due_date' => $_POST["due-date"] 
        		];    

        		//dnd ($fields);

        		// $target_dir=$_SERVER['DOCUMENT_ROOT'].PROOT.'asset/images/productrequest';
        		// $target_file=$target_dir.'/'.basename($images[0]);

        		//$db->insert('customer_requests',$fields);  

        		if (!($db->find('customer_requests'))) {
        			$id = 1;
        		} else {
        			$id=count($db->find('customer_requests'))+1;
        		}
        		

        		$images=($_FILES["fileUpload"]["name"]);
        		$pr_name=$_POST["design-name"];        		
        		$upTo=count($images);
        		for ($x = 0; $x < $upTo; $x++){
        			$image=$images[$x];
        			
	        		$imageTable=[
	        			'image_path'=>$image,
	        			'product_id'=>$id,
	        			'pr_name'=>$pr_name
	        		];

	        		//dnd($imageTable);
	        		if($db!=null){
	        			$db->insert('images',$imageTable);
	        		}
	        		
	        		//dnd("tghj");

	        	}

					$db->insert('customer_requests',$fields);

					$_SESSION['alert']='
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">			  
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

					<div class="container">
						<div class="alert alert-success fade in">    
					    	<strong>Success!</strong> You have successfully added a CUSTOM REQUEST!
					  	</div>
					</div>';					

        				

        		Router::redirect('home/ProductRequest');

        	}

        	$this->view->render('home/ProductRequest');

        }


        public function productViewAction($p_id){
        	//$p_id = 1;
        	
			$db=DB::getInstance();
			$params = array();			

			//load product table
			$product_array = array('conditions'=>'id = ?' , 'bind' => [$p_id ]);
			$product_obj = $db->findFirst('product_features',$product_array);	

			//load sub categories table and instert sub category name into product
			$sub_category_array = array('conditions' => 'id = ?' , 'bind' => [$product_obj->sub_category_id]);
			$sub_category_obj = $db->findFirst('sub_categories',$sub_category_array);
			$product_obj->sub_category_name = $sub_category_obj->name;

			//load categories table and instert main category name -> product_obj
			$main_category_conditions = array('conditions' => 'category_id = ?' , 'bind' => [$sub_category_obj->main_id]);
			$main_category_obj = $db->findFirst('categories',$main_category_conditions);
			$product_obj->main_category_name = $main_category_obj->category_name;
			array_push($params,$product_obj);

			//load images array - inster to params
			$images_array = array('conditions' => 'product_id = ?' , 'bind' => [$p_id ]);
			$images_details = $db->find('images',$images_array);
			array_push($params,$images_details);

			//load review table
			$review_array = array('conditions' => 'product_id = ?' , 'bind' => [$p_id ]);
			$review_details = $db->find('reviews',$review_array);
			$reverse_reviews = array();
			if (is_array($review_details)){
				$reverse_reviews = array_reverse($review_details);

				//load user table
				foreach($reverse_reviews as $review){
					$user_table = array('conditions' => 'id = ?', 'bind' => [$review->user_id]);
					$user = $db->findFirst('user',$user_table);
					$review->user_fname = $user->first_name;
					$review->user_lname = $user->last_name;
				}
			}
			array_push($params,$reverse_reviews);
			//dnd($params);


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


		




        public function addProductAction(){

        	$db = DB::getInstance();
        	$categories = $db->findFirst('sub_categories');
        	$params = [$categories];

        	if ($_POST) {
				$db = DB::getInstance();

//				dnd($_POST);

                $measurement1=0;$measurement2=0;$measurement3=0;
                if(strlen($_POST["measurement1"])>0) {
                    $measurement1 = 1;
                }
                if(strlen($_POST["measurement2"])>0) {
                    $measurement2 = 1;
                }
                if(strlen($_POST["measurement3"])>0) {
                    $measurement3 = 1;
                }

                $fields = [
                    "name" => $_POST["Product_Name"],
                    "description" => $_POST["Product_Description"],
                    "price" => $_POST["product_price"],
                    "sale_price" => $_POST["sale_price"],
                    "sub_category_id" => $_POST["category"],
                    "material" => $_POST["material"],
                    "measurement_1_al" => $measurement1,
                    "measurement_2_al" => $measurement2,
                    "measurement_3_al" => $measurement3
                ];
                $db->insert('product_features', $fields);

//                $sql = "SELECT * FROM products";
//                $db->query($sql);
//                dnd($detail);
                $product_id = $db->lastID();

                $target_dir = $_SERVER['DOCUMENT_ROOT'] . PROOT.'assets/images/products';
                $images=$_FILES["imagesUpload"];
//                dnd($images);
                $i=0;
        		foreach ($images["name"] as $path) {
                    $target_file = $target_dir . '/' . basename($path);
                    $target_file = ltrim($target_file,"/");
                    move_uploaded_file($images["tmp_name"][$i], $target_file);

        			$values = [
        				"product_id" => $product_id,
        				"image_path" => $path,
        			];
                    $i++;
        		    $db->insert('images', $values);
        	}

        		//insert to colors table

            }
            $this->view->render('home/addProduct', $params);

        }


		public function contactUsAction(){
			$this->view->render('home/ContactUs');
		}



	}