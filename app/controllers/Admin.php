<?php
	class Admin extends Controller {
 
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function newProductsAction(){
			
			$product = new Product();
        	$fields = [
        		'conditions' => 'permission = ?',
        		'bind' => ['0']
        	];
        	$params['products'] = $product->find($fields);
        	foreach ($params['products'] as $product) {

        		//bind images
        		$images = new TailorProductImage();
        		$fields = [
        			'conditions' => 'product_id = ?',
        			'bind' => [$product->id]
        		];
        		$images = $images->find($fields);
        		$product->images = $images;

        		//bind store logo
        		$store = new TailorShop();
        		$store = $store->getStoreByVendor($product->vendor_id);
        		$product->logo = $store->logo;

        		//set rating
        		$rating = new Rate();
        		$avgRating = $rating->calculateAvg($product->id);
        		$product->rating = $avgRating;
        		$product->ratingCount = $rating->getRateCount($product->id);
                //var_dump($product->ratingCount);

        		//set location
        		$product->streetName = $store->streetName2;
        		$product->city = $store->city;

        	}

        	//dnd($params['products']);
            $this->view->render('admin/newProducts', $params);
		}



	}