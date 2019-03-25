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
        	$p_id = 1;
        	
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
			$reverse_reviews = array_reverse($review_details);

			//load user table
			foreach($reverse_reviews as $review){
				$user_table = array('conditions' => 'id = ?', 'bind' => [$review->user_id]);
				$user = $db->findFirst('user',$user_table);
				$review->user_fname = $user->first_name;
				$review->user_lname = $user->last_name;
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