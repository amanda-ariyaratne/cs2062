<?php 

	class CustomRequest extends Model implements Observable{

		private $observers=array();

		public function __construct($_table=''){
			$_table='custom_request';
			parent::__construct($_table);			
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
			addObserver(new Notification());
			notifyObservers($product_id,$customer_id,$tailor_id,$status='0',$type='1');
		}

        
        public function findByID($p_id){
			return $this->findFirst(array('conditions' => 'id = ?', 'bind' => [$p_id]));
		}

		public function getViewDetails($a){
			$a=6*($a-1);
			$conditions = array('limit'=>$a.',6', 'conditions'=>'status = ?', 'bind' => ['0']);

			$details = $this->find($conditions);

			foreach ($details as $row){
				$image=new Image('custom_design_image');
				$images=$image->getImage($row->id);
				$row->images = $images;			
			}	

			$noOfRows=count($this->find());
			
			return [$details,$noOfRows];
		}

		public function createRequest(){
			
    		$fields=[
    			'pr_name'=> $_POST["design-name"],
    			'description'=> $_POST["design-Description"],
    			'location' => $_POST["postal-code"],
    			'color' => $_POST["color-picker"],
    			'due_date' => $_POST["due-date"] 
    		]; 

    		$this->insert($fields);
        	$_id = $this->lastInsertedID();

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

	}

 ?>

