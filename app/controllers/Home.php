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
			$details = $db->findFirst('products_1',$product_array);
			$params = array();
			array_push($params,$details);

			//load review table
			$db2=DB::getInstance();

			$review_array = array('condition' => 'product_id = ?' , 'bind' => [1]);
			$review_details = $db2->find('review',$review_array);
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
        	$categories = $db->find('sub_categories');
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
//                dnd($_POST);

                if($_POST["color1"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color1"]]);
                }
                if($_POST["color2"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color2"]]);
                }
                if($_POST["color3"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color3"]]);
                }
                if($_POST["color4"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color4"]]);
                }
                if($_POST["color5"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color5"]]);
                }
                if($_POST["color6"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color6"]]);
                }
                if($_POST["color7"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color7"]]);
                }
                if($_POST["color8"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color8"]]);
                }
                if($_POST["color9"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color9"]]);
                }
                if($_POST["color10"]!="#000000"){
                    $db->insert('product_colors',["product_id"=>$product_id , "color_code"=>$_POST["color10"]]);
                }

            }
            $this->view->render('home/addProduct', $params);

        }



	}