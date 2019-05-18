<?php

	class Model { 

		protected $_db, $_table, $_modelName, $_softDelete = false, $_columnNames = [];

		public $id;

		public function __construct($table){
			$this->_db = DB::getInstance();
			$this->_table = $table;
			$this->_setTableColumns();
			$this->_modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->_table)));
		}

		protected function _setTableColumns(){
			
			$columns = $this->get_columns();
			
			foreach ($columns as $column) {
				$columnName = $column->Field;
				$this->_columnNames[] = $column->Field;
				$this->{$columnName} = null;
			}
		}

		public function get_columns(){
			return $this->_db->get_columns($this->_table);
		}

		protected function _softDeleteParams($params){
			if ($this->_softDelete) {
				if (array_key_exists('conditions', $params)) {
					if (is_array($params['conditions'])) {
						$params['conditions'][] = "deleted_at IS NOT NULL";
					} else {
						$params['conditions'] .= " AND deleted_at IS NOT NULL";
					}
				} else {
					$params['conditions'] = "deleted_at IS NOT NULL";
				}
			}
			return $params;
		}

		public function find($params = []){
			$params = $this->_softDeleteParams($params);
			$results = [];
			$resultsQuery = $this->_db->find($this->_table, $params);
			if($resultsQuery!=false){
				foreach ($resultsQuery as $result) {
					$obj = new $this->_modelName($this->_table);
					$obj->populateObjectData($result);
					$results[] = $obj;    
				}
			}
			
			return $results;
		}

		public function findFirst($params = []){
			//$params = $this->_softDeleteParams($params);

			$resultQuery = $this->_db->findFirst($this->_table, $params);
			$result = new $this->_modelName($this->_table);
			if($resultQuery){
				$result->populateObjectData($resultQuery);
				return $result;
			} else {
				return [];
			}
		}

		protected function populateObjectData($obj){
			foreach ($obj as $key => $val) {
				$this->$key = $val;

			}
		}

		public function findById($id){
			return $this->findFirst(['conditions'=>'id = ?', 'bind'=>[$id]]);
		}

		public function insert($fields){

			if (empty($fields)) {
				
				return false;
			} else {
				return $this->_db->insert($this->_table, $fields);
			}
		}

		public function update($id, $fields){
			if (empty($fields)) {
				return false;
			} else {
				return $this->_db->update($this->_table, $id, $fields);
			}
		}

		public function delete($id){
			if ($id == '' && $this->id == '') {
				return false;
			}
			$id = ($id == '') ? $this->id : $id;
			if ($this->_softDelete) {
				date_default_timezone_set('Asia/Colombo');
				$date = date("Y-m-d H:i:s"); 
				return $this->update($id, ['deleted_at' => $date]);
			}
			return $this->_db->delete($this->_table, $id);
		}

		public function query($sql, $bind=[]){
			return $this->_db->query($sql, $bind);
		}

		public function save(){
			$fields = [];
			foreach ($this->_columnNames as $column) {
				$fields[$column] = $this->$column;
			}

			//determine whether to update or insert
			if (property_exists($this, 'id') && $this->id != '') {
				return $this->update($this->id, $fields);
			} 
			else {
				return $this->insert($fields);
			}
		}

		public function data(){
			$data = new stdClass();
			foreach ($this->_columnNames as $column) {
				$data->column = $this->column;
			}
			return $data;
		}

		public function assign($params){
			if (!empty($params)) {
				foreach ($params as $key => $val) {////////////////////////////
					if (in_array($key, $this->_columnNames)) {
						$this->$key = sanitize($val);
					}
				}
				return true;
			}
			return false;
		}

		public function lastInsertedID(){
			return $this->_db->lastID();
		}

		public function count(){
			return $this->_db->count();
		}
	}