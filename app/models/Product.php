<?php

    class Product extends Model implements Observable{

        protected $_table, $_modelName, $_softDelete = false;
        private $observers=array();
        public $id;


		public function __construct($table=''){
			$table='product';
			parent::__construct($table);
		}

        public function getAcceptedRequest($product_id,$tailor_id,$customer_id){
            
            //end of the function
            $this->addObserver(new Notification());
            $this->notifyObservers($product_id,$customer_id ,$tailor_id,$status='1', $type='4');
        }

        public function rejectRequest($product_id,$tailor_id,$customer_id){

            //end of the function
            $this->addObserver(new Notification());
            $this->notifyObservers($product_id,$customer_id ,$tailor_id,$status='0', $type='4');
        }

        public function notifyObservers($product_id,$tailor_id,$customer_id,$status ,$type){
            foreach ($this->observers as $observer){
                $observer->updateClass($product_id,$tailor_id,$customer_id,$status, $type);
            }
        }

        public function addObserver($obj){
            array_push($this->observers, $obj);
        }

        public function getViewDetails($pageNo){            
            $pageNo=6*($pageNo-1);

            $limit = array('limit'=>$pageNo.',6');

            $details = $this->find($limit);
            foreach ($details as $row){
                $image=new Image('tailor_product_image');
                $images=$image->getImage($row->id);
                $row->images = $images;         
            }   

            $noOfRows=count($this->find());
            
            return [$details,$noOfRows];
        }

        public function getCategoryViewDetails($pageNo,$sub_cat_id){
            $pageNo=6*($pageNo-1);
            
            $limit = ['limit'=>$pageNo.',6'];

            $conditions=['conditions'=> ['sub_category_id = ?'], 'bind'=> [$sub_cat_id]];
            $tot=array_merge($conditions, $limit);
            
            $details = $this->find($tot);
            
            // dnd($details[0]);
            foreach ($details as $row){
                $image=new Image('tailor_product_image');
                $images=$image->getImage($row->id);
                $row->images = $images;         
            }   

            $noOfRows=count($this->find($conditions));

            return [$details,$noOfRows];

            
        }

        public function getPageVendor($id){
            
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
            $user=new User();
            $user_info=$user->getDetails($con);
            $name=$user_info->first_name.$user_info->last_name;
            if ($details) {
                $details[0]->vendorName = $name;
            }


            //dnd($details);
            $noOfRows=count($this->find());
            
            return [$details,$noOfRows];
        }



        public function addProduct(){
//		    dnd($_POST);
            $fields['name'] = $_POST["Product_Name"];
            $fields['price'] = $_POST["product_price"];
            $fields['sub_category_id'] = $_POST["category"];
            $fields['vendor_id'] = currentUser()->id;
            if ($_POST["Product_Description"] != '') {
                $fields['description'] = $_POST["Product_Description"];
            }

            if ($_POST["material"] != '') {
                $fields['material'] = $_POST["material"];
            }
            
            $this->insert($fields);
            $pr_id = $this->lastInsertedID();

            //add measurements
            $mes = $_POST["mes"];
            $mesArry = explode(",",$mes);
            $newMesArry = $_POST["newMesurements"];
            $mesurements_arry = array_merge($mesArry,$newMesArry);
            $measurement = new Measurement("product_measurement");
            $measurement->addMesurement($pr_id,$mesurements_arry);

            //add colors
            $colors = $_POST["colors"];
            $color = new Color();
            $color->addColor($colors,$pr_id);

            //add image
            $images=($_FILES['fileUpload']['name']);

            for ($x=0; $x<sizeof($images); $x++){
                
                $image=new Image('tailor_product_image'); 

                $im_id=count($image->find());

                $image_name=date("Y-m-d-h-i-sa-").$this->_table.'-'.$im_id;

                $ext=pathinfo($images[$x])['extension'];
                $image_path=$image_name.'.'.$ext;

                $image->addImage($pr_id,$image_path,$x,'products');
            }


        }

        public function findBy_vendorId($v_id , $lmt , $p_id){
            $product_details = $this->_db->query("SELECT * FROM product WHERE vendor_id=".$v_id." AND NOT id=".$p_id." LIMIT ".$lmt.";")->results();

            $related_products = array();
            if (is_array($product_details)) {
                
                foreach ($product_details as $product){
                    $product_obj = array();
                    $product_obj['id'] = $product->id;
                    $product_obj['name'] = $product->name;
                    $product_obj['price'] = $product->price;
                    $product_obj['sale_price'] = $product->sale_price;
                
                    array_push($related_products, $product_obj);
                }
            }
            return $related_products;
        }

        public function findById($p_id){
            return $this->findFirst(array('conditions'=>'id = ?' , 'bind' => [$p_id ]));
        }


        public function getProductPriceByID($item_array){
            $new_item_array = array();
            foreach ($item_array as $item) {
                $product = $this->findById($item['product_id']);
                $item['name'] = $product->name;
                $item['price'] = $product->sale_price;
                array_push($new_item_array, $item);
            }
            return $new_item_array;
        }

        public function getViewDetailsForSearch($keywords, $a){
            $products = [];
            $keys = [];
            foreach ($keywords as $key) {
                $key = '%' . $key . '%';
                array_push($keys, $key);
            }

            $params = [
                'column' => 'name',
                'keys' => $keys,
                'limit' => $a . ',6'
            ];

            $details = $this->_db->search('product', $params);
            if ($details) {
                foreach ($details as $row){
                    $image=new Image('tailor_product_image');
                    $images=$image->getImage($row->id);
                    $row->images = $images;

                }

                $noOfRows=count($details);
            } else {
                $details = [];
                $noOfRows = 0;
            }

            return [$details,$noOfRows];
        }

        public function editProduct($pr_id){
            $fields['name'] = $_POST["Product_Name"];
            $fields['price'] = $_POST["product_price"];
            $fields['sub_category_id'] = $_POST["category"];
            $fields['vendor_id'] = currentUser()->id;
            if ($_POST["Product_Description"] != '') {
                $fields['description'] = $_POST["Product_Description"];
            }

            if ($_POST["material"] != '') {
                $fields['material'] = $_POST["material"];
            }
            $this->update($pr_id,$fields);
        }

        public function removeProduct($pr_id){
            $this->delete($pr_id);
        }

        public function changeActiveStatus($pr_id,$status){
            $details = $this->findById($pr_id);
            $fields = [
                "status" => $status
            ];
            $this->update($pr_id,$fields);
        }
    }






