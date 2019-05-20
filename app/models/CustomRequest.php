<?php 

	class CustomRequest extends Model implements Observable{

		private $table;
		private $observers=array();

		public function __construct($_table=''){
			$_table='custom_request';
			parent::__construct($_table);			
		}

		public function acceptRequest($id){
			$fields=['status'=> '1'];
			$this->update($id, $fields);
			// setChanged();
			// notifyObservers();
		}

		public function rejectRequest($id){
			$fields=['status'=> '0'];
			$this->update($id, $fields);
			// setChanged();
			// notifyObservers();
		}

		public function setChanged(){
			$id='dfgh';
            //implement changing functions
        }

        public function notifyObservers(){
            foreach($observers as $observer){
                $observer->update();
            }
        }

        public function addObserver($obj){
            array_push($observers, $obj);
        } 

        public function findByID($p_id){
			return $this->findFirst(array('conditions' => 'id = ?', 'bind' => [$p_id]));
		}

		public function getViewDetails($a){
			$a--;
			$limit = array('limit'=>$a++.',6');
			$details = $this->find($limit);

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

