<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Category;
	
	class Main_Controller extends Controller
	{
		public function index()
		{
			
			$this->title = 'Главная страница';
			$categories = (new Category) -> get_all();
			return $this->render('main/main', [
				'title' => $this->title,
			]);
		}
		
	}