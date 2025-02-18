<?php
	namespace Core;
	
	class Router
	{
		private $routes;
		
		public function getTrack( $routes, $uri )
		{
			foreach ( $routes as $route ) {
                $vars_route = explode('/', $route->path);
                $vars_uri = explode('/', $uri);
                $this_route = true;
                $params = [];
                if ( count( $vars_route ) !== count( $vars_uri ) ) {
                    $this_route = false;
                } else {
                    foreach ( $vars_route as $var_k => $var_route ) {
                        if ( $var_route == $vars_uri[$var_k] ) {
                            continue;
                        }
                        if ( ! empty( $var_route ) && $var_route[0] == ':' && ! empty( $vars_uri[$var_k] ) ) {
                            $param_name = substr( $var_route, 1 );
                            $params[$param_name] = $vars_uri[$var_k];
                        } else {
                            $this_route = false;
                            break;
                        }
                    }
                }
                if ($this_route) {
                    return new Track($route->controller, $route->action, $params);
                }
            }
			return new Track('error', 'not_found');
		}
	}