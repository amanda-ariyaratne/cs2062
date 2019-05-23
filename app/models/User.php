<?php

	class User extends Model implements observer{
		private $_isLoggedIn, $_sessionName, $_cookieName;
		public static $currentLoggedInUser = null;

		// customer = 0 ; default value
		// vendor = 1 :
		// admin  =2 ; 
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

		public function acceptProduct(){
			// by admin- accpet products
			// by tailor- take order 
		}

		public function updateClass($obj) {
			//implement the thing that user do after an object gets updated.
			//custmer and tailor
    	}

		public function findByEmail($email){
			$user =  $this->findFirst(['conditions'=>'email = ?' , 'bind'=>[$email]]);
			return $user;
		}

		public static function currentLoggedInUser(){
			if(!isset(self::$currentLoggedInUser) && Session::exists(CURRENT_USER_SESSION_NAME)){
				$u = new User((int)Session::get(CURRENT_USER_SESSION_NAME));
				self::$currentLoggedInUser = $u;
			}

			return self::$currentLoggedInUser;
		}




		public function login($rememberMe = false){
			Session::set($this->_sessionName, $this->id);
			$rememberMe = true;
			if ($rememberMe) {
				$hash = md5(uniqid()+rand(0,100));
				$user_agent = Session::uagent_no_version();
				Cookie::set($this->_cookieName, $hash, REMEMBER_ME_COOKIE_EXPIRY);
				$fields = ['session'=>$hash, 'user_agent'=>$user_agent, 'user_id'=>$this->id];
				$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?", [$this->id, $user_agent]);
				$this->_db->insert('user_sessions', $fields);
			}
		}



		public function logout(){
			$user_agnet = Session::uagent_no_version();
			$this->_db->query("DELETE FROM user_sessions WHERE user_id = ? AND user_agent = ?",[$this->id, $user_agent]);
			Session::delete(CURRENT_USER_SESSION_NAME);

			if(Cookie::exists(REMEMBER_ME_COOKIE_NAME)){
				Cookie::delete(REMEMBER_ME_COOKIE_NAME);
			}

			self::$currentLoggedInUser = null;
			return true;
		}


		public function getDetails($params){
			return $this->findFirst($params);
		}

		public function findByUserID($p_id){
			return $this->findFirst(array('conditions' => 'id = ?', 'bind' => [$p_id]));
		}

		public function sendPasswordResetEmail($email){

			//store token in database
			$this->removeOldToken($email);
			$password_reset = new PasswordReset();
			$token = $token = bin2hex(random_bytes(32));
			$fields = [
				'email' =>$email,
				'token' => $token
			];
			$password_reset->insertNewToken($fields);

			//send email
			$to = $email;
			$subject = "Password Recovery Mail - TailorMate.com";

			// Message
			$message = '<p>We recieved a password reset request. The link to reset your password is below. ';
			$message .= 'If you did not make this request, you can ignore this email</p>';
			$message .= '<p>Here is your password reset link:</br>';
			$message .= '<a href="localhost/cs2062/account/resetPassword?token=' . $token . '"><?=PROOT?>account/resetPassword?token='.$token.'</a>';
			$meesage .= '<p>Please note that the above link will be valid only for a time period of 24 hours.</p>';
			$message .= '<p>Thanks!</p>';

			$headers =  'MIME-Version: 1.0' . "\r\n"; 
			$headers .= 'From: TailorMate <admin@tailormate.com>' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

			if(mail($to, $subject, $message, $headers)){
				echo "Your Password has been sent to your email id";
			}else{
				echo "Failed to Recover your password, try again";
			}
		}

		public function removeOldToken($email){
			$password_reset = new PasswordReset();
			$password_reset->removeOldToken($email);
		}

		public function updatePassword($fields){
			return $this->update($this->id, $fields);
		}
	}