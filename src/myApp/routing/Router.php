<?php

namespace myApp\routing;


class Router {

	
	function __construct( $config ) {
		$this->config = $config;
	}
	
	function route($uri, $accessControl) {
			
		preg_match( $this->config['routeExpression'], $uri, $matches);
		
		//debug_r($matches);

		$method = $this->config['defaultMethod'];
		
		if (isset($_REQUEST['method'])){ //method comes from query string
			$method = $_REQUEST['method'];
			unset($_REQUEST['method']);
		}
		
		$controllerName = isset($matches['page']) ? $matches['page'] : $this->config['defaultController'];
		
		if (isset($matches['id'])){ //puts id in the query string, if the router detected one
			$_REQUEST['id'] = $matches['id'];
		}
		
		$controllerName = 'myApp\\controllers\\' . ucwords($controllerName);
		$controller = new $controllerName;

		$authorizedMethods = array_key_exists($controllerName, $accessControl)? $accessControl[$controllerName]:$accessControl['default'];
		
		$ac = new \myApp\accesscontrol\Main($controller, $authorizedMethods);

		//call it
		try{
			call_user_func(
				array( $ac, $method ),
				$_REQUEST
			);
			exit();
		} catch (Exception $e){
			debug($e->getMessage());
		}

	}
	
	
}