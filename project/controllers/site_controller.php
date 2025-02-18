<?php
	namespace Project\Controllers;
	use \Core\Controller;
	use \Project\Models\Site;
	use \Project\Models\Category;
	
	class Site_Controller extends Controller
	{
		public function category($params)
		{
			$category = (new Category) -> get_by_id($params['id']);
			$sites = (new Site) -> get_by_cat($params['id']);
			
            if ( ! $category ) {
                return $this->render_dev();
            }
			$this->title = $category['name'];

			return $this->render('site/category', [
				'title' => $this->title,
			]);
		}
		
		public function one($params)
		{
			$site = (new Site) -> get_by_id($params['id']);
			
            if ( ! $site ) {
                return $this->render_dev();
            }
			$this->title = $site['name'];

			return $this->render('site/one', [
				'title' => $this->title,
			]);
		}
		
		public function all()
		{
			$this->title = 'Список всех сайтов';
			
			$sites = (new Site) -> get_all();
			return $this->render('site/all', [
				'title' => $this->title,
			]);
		}
		
		public function add()
		{
			$this->title = 'Добавить сайт в каталог';
			
			return $this->render('site/add', [
				'title' => $this->title,
			]);
		}
	}