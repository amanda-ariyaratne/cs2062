<?php

	class Product extends Model {
//		protected $_db, $_table;
        protected $_db, $_table, $_modelName, $_softDelete = false, $_columnNames = [];

        public $id;


		public function __construct($products="product_features"){
			$table = $products;
			parent::__construct($table);


		}

		public function get_db(){
		    return $this->_db;
        }

        public function addProduct(){

//            $db = DB::getInstance();
//            $categories = $this->_db->find('sub_categories');
//            $params = [$categories];

            if ($_POST) {

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


                $this->id = $this->_db->lastID();

                $target_dir = $_SERVER['DOCUMENT_ROOT'] . PROOT . 'assets/images';
                $images = $_FILES["imagesUpload"];

                $i = 0;
                foreach ($images["name"] as $path) {
                    $target_file = $target_dir . '/' . basename($path);
                    $target_file = ltrim($target_file, "/");
                    move_uploaded_file($images["tmp_name"][$i], $target_file);

                    $values = [
                        "product_id" => $this->id,
                        "image_path" => $path,
                    ];
                    $i++;
                    $this->_db->insert('images', $values);
                }

                //insert to colors table

//                if ($_POST["color1"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color1"]]);
//                }
//                if ($_POST["color2"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color2"]]);
//                }
//                if ($_POST["color3"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color3"]]);
//                }
//                if ($_POST["color4"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color4"]]);
//                }
//                if ($_POST["color5"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color5"]]);
//                }
//                if ($_POST["color6"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color6"]]);
//                }
//                if ($_POST["color7"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color7"]]);
//                }
//                if ($_POST["color8"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color8"]]);
//                }
//                if ($_POST["color9"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color9"]]);
//                }
//                if ($_POST["color10"] != "#000000") {
//                    $db->insert('product_colors', ["product_id" => $product_id, "color_code" => $_POST["color10"]]);
//                }

            }
        }


	}



