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

	}

