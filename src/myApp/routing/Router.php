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
		
		$controllerName = 'myApp\\controllers\\' . ucwords($controllerName);
		$controller = new $controllerName;
		
		// create an Access Control to wrap the controller
		$accessControlList = 
		 isset($_SESSION['user']->accessControl)? 
		 	$_SESSION['user']->accessControl:
			array('default'=>array('read','create','update','delete'));/*for demo, all profiles will have it after*/
		
		$ac = new \myApp\accessControl\Main($controller, $accessControlList);

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
	
	
	function getAccessList() {
		if (isset($_SESSION['user'], $_SESSION['user']->accessControl)){
			return $_SESSION['user']->accessControl;
		} else if (isset($_SESSION['user'])){
			return array();
		}
	}
	
	
}