<?php
	namespace Core;
	
	class Controller
	{
		protected $title = 'IT-Catalog';
		protected $layout = 'layout';
        public function render_dev () {
            $this->title = 'Страница в разработке';
            return $this->render(
                'common/dev', 
                [
                    'text' => 'Скоро будет готово',
                    'title' => $this->title
                ]
            );
        }
		protected function render($view, $data) {
			return new Page($this->layout, $this->title, $view, $data);
		}
	}