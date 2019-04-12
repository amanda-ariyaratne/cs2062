<?php

	class User extends Model{
		private $_isLoggedIn, $_sessionName, $_cookieName;
		public static $currentLoggedInUser = null;

		public function __construct($user=''){
			$table = 'user';
			parent::__construct($table);
			$this->_sessionName = CURRENT_USER_SESSION_NAME;
			$this->_cookieName = REMEMBER_ME_COOKIE_NAME;
			$this->_softDelete = true;
			if ($user != '') {
				if (is_int($user)) {
					$u = $this->_db->findFirst($table, ['conditions'=>'id = ?','bind'=>[$user]]);
				} else {
					$u = $this->_db->findFirst($table, ['conditions'=>'user_name = ?', 'bind'=>[$user]]);///////////////////////
				}
				if ($u) {
					foreach ($u as $key => $value) {
						$this->$key = $value;
					}
				}
			}
		}



		public function findByEmail($email){
			return $this->findFirst(['conditions'=>"email = ?" , 'bind'=>[$email]]);
		}



		public static function currentLoggedInUser(){
			if(!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)){
				//dnd(Session::get(CURRENT_USER_SESSION_NAME));
				$u = new User((int)Session::get(CURRENT_USER_SESSION_NAME));
				self::$currentLoggedInUser = $u;
			}

			return self::$currentLoggedInUser;
		}




		public function login($rememberMe = false){
			Session::set($this->_sessionName, $this->id);////////

			if ($rememberMe) {
				$hash = md5(uniqid()+rand(0,100));
				$user_agent = Session::uagent_no_version();
				Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
				$fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
				$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
				$this->_db->insert('user_sessions', $fields);
			}
		}


		public function getDetails($params){
			return $this->findFirst($params);
		}
		// public function logout(){
		// 	$user_agnet = Session::uagent_no_version();
		// 	$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?",[$this->id, $user_agent]);
		// 	Session::delete(CURRENT_USER_SESSION_NAME);

		// 	if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
		// 		Cookie::delete(REMEMBER_ME_COOKIE_NAME);
		// 	}

		// 	self::$currentLoggedInUser = null;
		// 	return true;
		// }


		public function findByUserID($p_id){
			return $this->findFirst(array('conditions' => 'id = ?', 'bind' => [$p_id]));
		}
	}