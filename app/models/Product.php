<?php

	class Product extends Model {
//		protected $_db, $_table;
        protected $_db, $_table, $_modelName, $_softDelete = false, $_columnNames = [];

        public $id;


		public function __construct($product){
			$table = $product;
			parent::__construct($table);
		}

		public function get_db(){
		    return $this->_db;
        }

        public function getViewDetails($a){
            $a--;
            $limit = array('limit'=>$a++.',6');
            $details = $this->find($limit);

            foreach ($details as $row){
                $image=new Image('tailor_product_image');
                $images=$image->getImage($row);
                $row->images = $images;         
            }   

            $noOfRows=count($this->find());
            
            return [$details,$noOfRows];
        }


        public function getViewDetailsOfId($id){
            
            $conditions = array('conditions'=>'vendor_id =?','bind'=> [$id]);
            $details = $this->find($conditions);

            foreach ($details as $row){
                //get Image details
                $image=new Image('tailor_product_image');
                $images=$image->getImage($row);
                $row->images = $images;     
            }

            //get vendor's name
            $con=array('conditions'=>'id =?','bind'=> [$row->vendor_id]); 
            $user=new User('user');
            $user_info=$user->getDetails($con);
            $name=$user_info->first_name.$user_info->last_name;
            $details[0]->vendorName = $name; 

            //dnd($details);
            $noOfRows=count($this->find());
            
            return [$details,$noOfRows];
        }



        public function addProduct(){

//		    dnd($_POST);

            $fields = [
                "name" => $_POST["Product_Name"],
                "description" => $_POST["Product_Description"],
                "price" => $_POST["product_price"],
                "sale_price" => $_POST["sale_price"],
                "sub_category_id" => $_POST["category"],
                "material" => $_POST["material"]
            ];
            
            $this->insert($fields);
            //add image
            $pr_id = $this->lastInsertedID();
            $images=($_FILES['fileUpload']['name']);
            //dnd($images);


            for ($x=0; $x<sizeof($images); $x++){
                
                $image=new Image('tailor_product_image'); 

                $im_id=count($image->find());

                $image_name=date("Y-m-d-h-i-sa-").$this->_table.'-'.$im_id;
                
                $ext=pathinfo($images[$x])['extension'];
                $image_path=$image_name.'.'.$ext;

                $image->addImage($pr_id,$image_path,$x,'products');
            }

//            $measurements = json_decode($_POST['mesname']);
//            dnd($measurements);
            //add colors
//            dnd($_POST["color"]);
            for ($x=1; $x<= 10; $x++){
                $color='color'.$x;

                if ($_POST[$color]!=''){
                    $color=new Color('color');
                    $cl_id=count($color->find());

                    $params=["pr_id"=>$product_id , "color_code"=>$_POST["color".$x]];
                    $color=new Color('color');
                    $color->addProduct($pr_id,);
                }            
            }


        }

        public function getDetails(){

        }


	}



