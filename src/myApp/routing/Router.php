<?php

namespace myApp\routing;


class Router {
	
	function __construct() {	
	}
	
	
	private $routeExpression = '@/(?P<app>\w+)(:?/(?P<page>\w+)(:?/(?P<id>[^/]+))?)?@';
	
	function route($uri) {
			
		preg_match( $this->routeExpression, $uri, $matches);
		
		//debug_r($matches);

		$method = 'read'; //by default
		
		if (isset($_REQUEST['method'])){
			$method = $_REQUEST['method'];
			unset($_REQUEST['method']);
		}
		
		$controllerName = isset($matches['page']) ? $matches['page'] : 'main'/* default page */;
		
		if (isset($matches['id'])){
			$_REQUEST['id'] = $matches['id'];
		}
		
		// Authentication Access Control
		if (!isset($_SESSION['user']) && $controllerName !== 'authentication'){
			$login = new \myApp\controllers\Login;
			$login->read();
		}
		
		$controllerName = 'myApp\\controllers\\' . ucwords($controllerName);
		$controller = new $controllerName;
		
		// Default Access Control for each controller
		$accessControlList = 
		 isset($_SESSION['user']->accessControl)? 
		 	$_SESSION['user']->accessControl:
			array('default'=>array('read','create','update','delete'));/*for demo, all profiles will have it after*/
		
		$authorizedMethods = array_key_exists($controllerName, $accessControlList)? $accessControlList[$controllerName]:$accessControlList['default'];
		
		$ac = new \myApp\accessControl\Main($controller, $authorizedMethods);

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