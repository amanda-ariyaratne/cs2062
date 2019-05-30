<?php 
	class Image extends Model{

		public function __construct($table){
			parent::__construct($table);
		}

		//add image to the table\\
		public function addImage($pr_id,$image_path,$ind,$folder){
    		$imageTable=[
    			'path'=>$image_path,
    			'product_id'=>$pr_id
    		];
			$this->insert($imageTable);

			$this->saveImage($image_path,$ind,$folder);

		}

		public function removeOld($pr_id){
		}

		public function updateImage($pr_id,$image_path,$ind,$folder){
    		$imageTable=[
    			'path'=>$image_path,
    			'product_id'=>$pr_id
    		];
			$this->insert($imageTable);

			$this->saveImage($image_path,$ind,$folder);
		}

		public function saveImage($im_path,$ind,$folder){


			$target_dir = $_SERVER['DOCUMENT_ROOT'] . PROOT.'assets/images/'.$folder;


			$target_file = ltrim($target_file,"/");

			move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$ind], $target_dir.'/'.$im_path);
		}


		public function removeImage(){}

		// get details of a particular image\\

		public function getImage($detail){


			$pr_id = $detail->id;

			$condition=array('conditions'=> 'product_id = ?','bind'=>[$pr_id]);
			$image_details = $this->find($condition);
			$images = array();

			if (is_array($image_details)) {
				foreach ($image_details as $imagePath){
					array_push($images,$imagePath->path);
				}
			}
			return $images;
		}


		public function getMoreImagesByVendor($related_products){
			$products = array();
			foreach ($related_products as $product) {
				$image_details = $this->findFirst(array('conditions'=> 'product_id = ?','bind'=>[$product['id']]));
				$product['path'] =  $image_details->path;
				array_push($products, $product);
			}
			return $products;

		}

	}


 ?>

