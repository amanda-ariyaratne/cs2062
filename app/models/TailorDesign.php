<?php

	class TailorDesign extends Model {
		protected $_db, $_table;


		public function __construct($products=""){
			$table = "products";
			parent::__construct($table);
		}

		public function createRequest(){
			$measurement1 = 0;
            $measurement2 = 0;
            $measurement3 = 0;
            if (strlen($_POST["measurement1"]) > 0) {
                $measurement1 = 1;
            }
            if (strlen($_POST["measurement2"]) > 0) {
                $measurement2 = 1;
            }
            if (strlen($_POST["measurement3"]) > 0) {
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
            $this->insert($fields);

            $id = $this->lastInsertedID();
    		$images=($_FILES["fileUpload"]["name"]);

    		foreach ($images as $image_path){
    			$image=new Image('tailor_product_images'); 
    			$image->addImage($id,$image_path);
    		}
		}
	}

?>