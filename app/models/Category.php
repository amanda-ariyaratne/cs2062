<?php 
	class Category extends Model{
		private $table;

		public function __construct($_table){
			$this->table=$_table;
			parent::__construct($_table);
		}

		public function getDetails(){
			return $this->find();
		}

		public function getSubCat($id){
			$condition = array('conditions'=>'main_id = ?','bind'=>[$id]);
			$sub=new SubCategory('sub_category');
			return $sub->getSubCat($condition);
		}

		public function getCatSubCatArray(){
			$result=array();
			$cats=$this->getDetails();

			foreach ($cats as $cat){
				
				//array_push($result,$cat->name);
				$result[$cat->name]=array();

				$subCats=$this->getSubCat($cat->id);
				$subList=array();				
				foreach ($subCats as $sub) {
					array_push($subList,$sub->name);		
				}
				$result[$cat->name]=$subList;

			}
			return $result;
		}

	}
 ?>