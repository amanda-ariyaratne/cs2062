<?php 
	class CustomRequest extends Model implements Observable{

		private $observers=array();
		protected $user, $_table;

		public function __construct($_table=''){
			$_table='custom_request';
            $this->_table=$_table;
			parent::__construct($_table);	
			$userObject=new User();
			$this->user=$userObject->currentLoggedInUser()->id;
		}

        public function changeActivationMode($data, $pr_id){
            $field=['active'=>$data];
            $this->update($pr_id,$field);
        }

        public function deleteCustomRequest($pr_id){
            //deletes all images of the product
            $image=new Image('custom_design_image');
            $image->deleteAllImages($pr_id);

            //delete all measuremenets
            $measurement=new Measurement('custom_request_measurement');
            $measurement->deleteAllMeasurement($pr_id);
            $this->delete($pr_id);
        }

		public function getAllCustomRequests($a){			
			$a=6*($a-1);

			$limit=['limit'=>$a.',6'];
			$conditions = ['conditions'=>['status = ?', 'active=?'], 'bind' => ['0','1']];

			$allConditions=array_merge($conditions, $limit);

			$details = $this->find($allConditions);
			
			foreach ($details as $row){
				$image=new Image('custom_design_image');
				$images=$image->getImage($row->id);
				$row->images = $images;			
			}	
			$noOfRows=count($this->find($conditions));
			
			return [$details,$noOfRows];
		}

		public function getMyCustomRequests($customer_id){
			$conditions=array('conditions'=> 'customer_id = ?' , 'bind' => [$customer_id]);

			$fields=$this->find($conditions);

			// dnd($fields[0]);
			$image=new Image('custom_design_image');	

			foreach($fields  as $field){
				$images=array();
				$conditions=['conditions'=> 'product_id = ?', 'bind' => [$field->id]];
				$image_set=$image->find($conditions);

				$field->images=$image_set;
			}
			// dnd($fields);
			return $fields;		
		}

        public function notifyObservers($product_id,$to,$from,$status,$type){
            foreach ($this->observers as $observer){
                $observer->updateClass($product_id, $to, $from, $status, $type);
            }
        }

		public function addObserver($obj){
            array_push($this->observers, $obj);
        }

        // tailor confirms order
		public function acceptRequest($product_id,$tailor_id,$customer_id){
			$fields=['status'=> '1', 'tailor_id'=>$tailor_id];
			$this->update($product_id, $fields);

			//set Notification
			$this->addObserver(new Notification());
			$this->notifyObservers($product_id,$customer_id,$tailor_id,$status='1',$type='1');
		}

		public function cancelRequest($product_id,$tailor_id,$customer_id){
			$fields=['status'=> '0','tailor_id'=>'0'];
			$this->update($product_id,$fields);

			//set notification
			$this->addObserver(new Notification());
			$this->notifyObservers($product_id,$customer_id,$tailor_id,$status='0',$type='1');
		}

        
        public function findByID($p_id){
			return $this->findFirst(array('conditions' => 'id = ?', 'bind' => [$p_id]));
		}

		
		public function createRequest(){
			
    		$fields=[
    			'pr_name'=> $_POST["design-name"],
    			'customer_id'=>$this->user,
    			'status'=>'0',  			
    			'description'=> $_POST["design-Description"],
    			'location' => $_POST["postal-code"],
    			'color' => $_POST["color-picker"],
    			'min_price'=>$_POST["min-price"],
    			'max_price'=>$_POST["max-price"],
    			'due_date' => $_POST["due-date"] 
    		]; 

    		$this->insert($fields);
        	$_id = $this->lastInsertedID();

    		$measurements=$_POST["measurement"];
    		$types=$_POST["type"];
// dnd($types);
    		$measurement=new Measurement('custom_request_measurement');
    		$measurement->addNewMeasurement($_id, $this->user, $types, $measurements);

    		// dnd($measurements);

    		

    		$images=($_FILES["fileUpload"]['name']);
    		for ($x=0; $x<sizeof($images); $x++){
    			
    			$image=new Image('custom_design_image'); 

    			$im_id=count($image->find())+1;

    			$image_name=date("Y-m-d-h-i-sa").'-'.$this->_table.'-'.$im_id;
    			$ext=pathinfo($images[$x])['extension'];
    			$image_path=$image_name.'.'.$ext;

    			$image->addImage($_id,$image_path,$x,'custom_requests');
    			
    		}
		}

		public function updateCustomRequest($pr_id){
			
    		$fields=[
    			'pr_name'=> $_POST["design-name"],
    			'customer_id'=>$this->user,
    			'status'=>'0',  			
    			'description'=> $_POST["design-Description"],
    			'location' => $_POST["postal-code"],
    			'color' => $_POST["color-picker"],
    			'min_price'=>$_POST["min-price"],
    			'max_price'=>$_POST["max-price"],
    			'due_date' => $_POST["due-date"] 
    		]; 

    		$this->update($pr_id, $fields);

    		$measurements=$_POST["measurement"];
    		$types=$_POST["type"];

    		$measurement=new Measurement('custom_request_measurement');
    		$measurement->updateMeasurement($pr_id, $this->user, $types, $measurements);


    		$images=($_FILES["fileUpload"]['name']);

            $image=new Image('custom_design_image');
            //dnd($images); 
            //$image->removeOld($pr_id);
    		for ($x=0; $x<sizeof($images); $x++){
    			$im_id=count($image->find())+1;

    			$image_name=date("Y-m-d-h-i-sa").'-'.$this->_table.'-'.$im_id;
    			$ext=pathinfo($images[$x])['extension'];
    			$image_path=$image_name.'.'.$ext;

    			$image->addImage($pr_id,$image_path,$x,'custom_requests');
    			
    		}
		}


	}

 ?>

