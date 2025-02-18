<?php
	namespace Project\Controllers;
	use \Core\Controller;
	
	class Error_Controller extends Controller
	{
		public function not_found()
		{
			
			$this->title = 'Ошибка 404';
			return $this->render('common/404', [
				'text' => 'Страница не найдена',
				'h1' => $this->title
			]);
		}
		
	}