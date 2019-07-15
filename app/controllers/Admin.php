<?php
	class Admin extends Controller {
 
		public function __construct($controller, $action){
			parent::__construct($controller, $action);
		}

		public function newProductsAction(){

            if (currentUser()) {
                if (currentUser()->role == 1) {
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

                        //set location
                        $product->streetName = $store->streetName2;
                        $product->city = $store->city;

                    }

                    $this->view->render('admin/newProducts', $params);
                } else {
                    Router::redirect('home/pageNotFound');
                }
            } else {
                Router::redirect('account/login');
            }
        			

		}


        public function approvePageAction($p_id){

            if (currentUser()) {
                if (currentUser()->role == 1) {
                    $params = array();

                    //get product
                    $product = new Product();
                    $product_obj = $product->findById($p_id);

                    //load sub categories table and instert sub category name into product
                    $sub_category_obj = new SubCategory();
                    $sub_category_details = $sub_category_obj->findByID($product_obj->sub_category_id);
                    $product_obj->sub_category_name = $sub_category_details->name;

                    //load categories table and instert main category name -> product_obj
                    $category_obj = new Category();
                    $category_details = $category_obj->findByID($sub_category_details->main_id);
                    $product_obj->main_category_name = $category_details->name;
                    $params['product'] = $product_obj;

                    //add product images array - inster to params
                    $img = new Image('tailor_product_image');
                    $images = $img->getImage($p_id);
                    $params['images'] = $images;

                    //new user object
                    $user_obj = new User();

                    //add vendor name
                    $product_obj->vendor = $user_obj->findByUserID($product_obj->vendor_id);

                    //load product colors
                    $color = new Color();
                    $params['colors'] = $color->getColorByproductID($p_id);

                    //load product measurements
                    $measurement = new Measurement('product_measurement');
                    $params['measurements'] = $measurement->getMeasurementByID($p_id);


                    //dnd($params);
                    $this->view->render('admin/approvePage',$params);
                } else {
                    Router::redirect('home/pageNotFound');
                }
            } else {
                Router::redirect('account/login');
            }
        }

        // public function approveProduct(){
        //     // if(){

        //     // }
        //     // else{
                
        //     // }
        // }


        public function newsletterAction(){
            if (currentUser()) {
                if (currentUser()->role == 1) {
                    $this->view->render('admin/newsletter');
                } else {
                    Router::redirect('home/pageNotFound');
                }
            } else {
                Router::redirect('account/login');
            }            
        }

        public function sendNewsletterAction(){
            if (currentUser()) {
                if (currentUser()->role == 1) {
                    $admin = new SystemAdmin(currentUser()->id);
                    $admin->sendNewsletter($_POST['subject'], $_POST['content']);
                    Router::redirect('admin/newsletterSuccess');
                } else {
                    Router::redirect('home/pageNotFound');
                }
            } else {
                Router::redirect('account/login');
            }
                    
        }

        public function newsletterSuccessAction(){
            if (currentUser()) {
                if (currentUser()->role == 1) {
                    $this->view->render('admin/newsletterSuccess');
                } else {
                    Router::redirect('home/pageNotFound');
                }
            } else {
                Router::redirect('account/login');
            }
            
        }

        public function subscribersListAction(){
            if (currentUser()) {
                if (currentUser()->role == 1) {
                    $this->view->render('admin/subscribersList');
                } else {
                    Router::redirect('home/pageNotFound');
                }
            } else {
                Router::redirect('account/login');
            }
        }

        public function jsonSubscribersListAction(){
            $subscribersList = [];
            $all_subscribers = new Subscriber();
            $all_subscribers = $all_subscribers->find([]);
            $i = 1;
            foreach ($all_subscribers as $subscriber) {
                $row = [];
                array_push($row, $i);
                $i++;
                array_push($row, $subscriber->email);
                array_push($row, $subscriber->created_at);
                array_push($row, '<button data-id="'.$subscriber->id.'" class="btn btn-1"><i class="fas fa-trash sub-remove"></i></button>');
                array_push($subscribersList, $row);
            }
            //$subscribersList = json_encode($subscribersList);
            echo json_encode(array('data'=> $subscribersList));
            return $subscribersList;
        }

        public function deleteSubscriberAction(){
            $id = $_POST['id'];
            $subscriber = new Subscriber();
            $subscriber->deleteSubscriber($id);
            echo json_encode($id);
        }

        public function approveAction($pr_id){
            $product = new Product();
            $product->approveProduct($pr_id);
            $this->newProductsAction();

        }

        public function notifyApprovalAction(){
            $order_obj = $this->find(array('limit'=>1  , 'order'=>'id DESC'));
            $notification_obj = new Notification();
            $notification_obj->updateClass($order_obj[0]->id , $order_obj[0]->vendor_id , $order_obj[0]->user_id , '1' , '4');
        }

	}