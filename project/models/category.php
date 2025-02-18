<?php
	namespace Project\Models;
	use \Core\Model;
	
	class Category extends Model
	{
		public function get_by_id($id)
		{
			return $this->findOne("SELECT * FROM categories WHERE id=:id", ['id' => $id]);
		}
		
		public function get_all()
		{
			return $this->findMany("SELECT * FROM categories");
		}
	}
