<?php

	class View {
		protected $_head, $_body, $_siteTitle , $_outputBuffer, $_layout = DEFAULT_LAYOUT;

		public function __construct(){

		}

		public function render($viewName, $params =[]){

			$user = new User();

			$category=new Category('category');
			$categories=$category->getCatSubCatArray();
			try {
				$user = $user->currentLoggedInUser();
			} catch (Exception $e) {
				$user = null;
			}

			$notification=new Notification('notification');
			//get old notifications
			$old=$notification->getSeenNoti($user->id);
			//get new notification
			$new=$notification->getNewNoti($user->id);
			// dnd($new);
			$viewArray = explode('/', $viewName);
			$viewString = implode(DS, $viewArray);
			if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
				include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
				include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php');
			} 
			else {
				die('The view \"' . $viewName . '\" does not exist.');
			}
		}



		public function renderFrontPage($viewName, $params =[]){

			
			$user = new User();
			$user = $user->currentLoggedInUser();

			$viewArray = explode('/', $viewName);
			$viewString = implode(DS, $viewArray);
			if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
				include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
				//include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $layout . '.php');
			} else {
				die('The view \"' . $viewName . '\" does not exist.');
			}
		}

		public function renderLayout($viewName, $layoutName, $params =[]){

			
			$user = new User();
			$user = $user->currentLoggedInUser();

			$viewArray = explode('/', $viewName);
			$viewString = implode(DS, $viewArray);
			if (file_exists(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php')) {
				include(ROOT . DS . 'app' . DS . 'views' . DS . $viewString . '.php');
				include(ROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $layoutName . '.php');
			} else {
				die('The view \"' . $viewName . '\" does not exist.');
			}
		}

		public function content($type){
			if ($type == 'head') {
				return $this->_head;
			} elseif ($type == 'body') {
				return $this->_body;
			}
			return false;
		}

		public function start($type){
			$this->_outputBuffer = $type;
			ob_start();
		}	
		
		public function end(){
			if ($this->_outputBuffer == 'head') {
				$this->_head = ob_get_clean();
			} elseif ($this->_outputBuffer == 'body') {
				$this->_body = ob_get_clean();
			} else {
				die('You must first run the start method');
			}
		}

		public function siteTitle(){
			return $this->_siteTitle;
		}

		public function setSiteTitle($title){
			$this->_siteTitle = $title;
		}	

		public function setLayout($path){
			$this->_layout = $path;
		}
	}