<?php
	namespace Project\Models;
	use \Core\Model;
	
	class Site extends Model
	{
		public function get_by_id($id)
		{
			return $this->findOne("SELECT * FROM sites WHERE id=:id", ['id' => $id]);
		}

		public function get_by_cat($id)
		{
			return $this->findOne("SELECT * FROM sites WHERE cat_id=:id", ['id' => $id]);
		}
		
		public function get_all()
		{
			return $this->findMany("SELECT * FROM sites");
		}
	}
