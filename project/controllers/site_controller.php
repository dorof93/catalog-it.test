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
		
		public function form()
		{
			$this->title = 'Добавить сайт в каталог';
			$cats = (new Category) -> get_all();
			
			return $this->render('site/add', [
				'title' => $this->title,
				'cats' => $cats,
			]);
		}
		
		public function add()
		{
			$args = [
				'name'        => $_POST['name'],
				'domain'      => $_POST['domain'],
				'description' => $_POST['description'],
				'screen'      => '',
				'cat_id'      => intval( $_POST['cat_id'] ),
			];

			if ( ! empty($_FILES['screenfile']['name'][0]) ) {
				$uploaddir = '/project/uploads/';
				if ( ! file_exists($_SERVER['DOCUMENT_ROOT'] . $uploaddir) ) {
					mkdir($_SERVER['DOCUMENT_ROOT'] . $uploaddir, 0755, true);
				}
				$pathinfo = pathinfo($_FILES['screenfile']['name'][0]);
				$uploadfile_ext = strtolower($pathinfo['extension']);
				switch ($uploadfile_ext) {
					case 'jpg':
					case 'jpeg':
					case 'gif':
					case 'png':
						$format = '.' . $uploadfile_ext;
					break;
					default:
						$format = '';
					break;
				}
				if ( !empty($format) ) {
					$new_filename = str_replace('.', '_', $args['domain']);
					$new_filename = preg_replace('|[^a-z0-9_-]|', '', $new_filename);
					$new_filename = $new_filename . $format;
					$file_path = $uploaddir . $new_filename;
					$server_file_path = $_SERVER['DOCUMENT_ROOT'] . $uploaddir . $new_filename;
					if ( is_uploaded_file($_FILES['screenfile']['tmp_name'][0]) && move_uploaded_file($_FILES['screenfile']['tmp_name'][0], $server_file_path) ) {
						$args['screen'] = $file_path;
					}
				}
			}
			if ( $this->validate_add_form($args) ) {
				$insert = (new Site) -> add($args);
			}
			header('location: /add_site/');
			die();
		}

		private function validate_add_form ($args) {
			if ( empty($args['name']) ) {
				$_SESSION['errors'][] = 'Пожалуйста, введите корректное название';
			}
			if ( ! filter_var($args['domain'], FILTER_VALIDATE_URL) ) {
				$_SESSION['errors'][] = 'Пожалуйста, введите корректный домен';
			}
			if ( empty($args['cat_id']) ) {
				$_SESSION['errors'][] = 'Пожалуйста, укажите категорию';
			}
			if ( ! empty($_SESSION['errors']) ) {
				return false;
			}
			return true;
		}
	}