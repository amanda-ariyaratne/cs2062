<?php

	class Home extends Controller {
        public $image;

		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}


		public function indexAction(){
			$this->view->render('home/index');
		}


		public function CategoryItemAction($id){
			$db=DB::getInstance();
			$condition=array('conditions'=> 'sub_category = ?','bind'=>[$id]);
			$limit = array('limit'=>$id.',3');
			$details=$db->findFirst('products',$condition,$limit);
		

			$temp= array($db->findFirst('products',$condition));
			$noOfProducts = count($temp[0]);

			$params=array($details,$id,$noOfProducts);
			$this->view->render('home/ProductList',$params);
		}

		
		public function ProductListAction($a){
			$db=DB::getInstance();
			$limit = array('limit'=>$a.',6');
			$details = $db->findFirst('products',$limit);
			
			$temp= array($db->findFirst('products'));
			$noOfProducts = count($temp[0]);

			$params=array($details,$a,$noOfProducts);

			$this->view->render('home/ProductList',$params);
		}



		public function Men_s_Baseball_T_ShirtAction(){
			$this->view->render('home/Men_s_Baseball_T_Shirt');
		}



        public function addProductAction(){

        	$db = DB::getInstance();
        	$categories = $db->find('sub_categories');
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


        // public function ProductRequestAction(){

        //     $this->view->render('home/ProductRequest');
        // }
         public function ProductRequestAction(){

        	$db=DB::getInstance();
        	
        	if($_POST){
        		$fields=[
        			"name"=> $_POST["design_name"],
        			"description"=> $_POST["Design-Description"],
        			// "image"=> $_POST["design_name"],
        			"location" => $_POST["postal code"],
        			"date" => $_POST["due date"]
        		];    
        		$this->insert('customer_requests',$fields);
        	}
            $this->view->render('home/test',$fields);
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

			$review_params = array();
			array_push($review_params,$review_details);
			array_push($params,$review_params);
			//dnd($params);

			$this->view->render('home/productView',$params);
		}




	}