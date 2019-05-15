<?php

	class PasswordReset extends Model{

		public function __construct(){
			$table = 'password_reset';
			parent::__construct($table);
		}

		public function insertNewToken($fields){
			$this->insert($fields);
		}

		public function removeOldToken($email){

			$oldToken = $this->getTokenByEmail($email);
			if ($oldToken) {
				$this->delete($oldToken->id);
			}
		}

		public function getTokenByEmail($email){
			return $this->findFirst(['conditions'=>"email = ?" , 'bind'=>[$email]]);
		}

		public function getPRByToken($token){
			return $this->findFirst(['conditions'=>"token = ?" , 'bind'=>[$token]]);
		}

		public function isValid(){
			$created_at = new DateTime($this->created_at, new DateTimeZone('Asia/Colombo'));
			date_default_timezone_set('Asia/Colombo');
			$now = new DateTime();
			$created_at->modify('+1 day');
			if ($created_at < $now) {
				return false;
			} else {
				return true;
			}
		}

	}

