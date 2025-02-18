<?php
	namespace Core;
	
	class Dispatcher
	{
		public function getPage(Track $track)
		{
            $track->controller;
            $track->action;
            $track->params;
            $controller_name = '\\Project\\Controllers\\' . ucfirst( $track->controller ) . '_Controller';
            $controller = new $controller_name;
            if ( method_exists( $controller, $track->action ) ) {
                return $controller -> {$track->action}( $track->params );
            }
            $def_controller = new Controller;
            return $def_controller->render_dev();
			
		}
	}