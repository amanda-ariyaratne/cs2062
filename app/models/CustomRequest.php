<?php 

	class CustomRequest extends Model implements Observable{

		private $table;
		private $observers=array();

		public function __construct($_table){
			$this->table=$_table;
			parent::__construct($_table);			
		}

		public function getAcceptedRequest(){
			setChanged();
			notifyObservers();
		}

		public function setChanged(){
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

		public function getViewDetails($a){
			$a--;
			$limit = array('limit'=>$a++.',6');
			$details = $this->find($limit);

			foreach ($details as $row){
				$image=new Image('custom_design_image');
				$images=$image->getImage($row);
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

		public function addRequest(){

		}

		public function deleteRequest(){

		}

		public function getPendingRequest(){

		}

		public function acceptRequest(){

		}

		public function takeDeal(){

		}
	}

 ?>
