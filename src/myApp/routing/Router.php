<?php

namespace myApp\routing;
use \lib\jsonloader\JsonToArray;

class Router {

	
	function __construct() {	
	}
	
	
	function route($uri) {
		
		$config = JsonToArray::fetchConfig(  __DIR__ .'/routes.json' );
			
		preg_match( $config['routeExpression'], $uri, $matches);
		
		//debug_r($matches);

		$method = $config['defaultMethod'];
		
		if (isset($_REQUEST['method'])){ //method comes from query string
			$method = $_REQUEST['method'];
			unset($_REQUEST['method']);
		}
		
		$controllerName = isset($matches['page']) ? $matches['page'] : $config['defaultController'];
		
		if (isset($matches['id'])){ //puts id in the query string, if the router detected one
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
		$rbac = JsonToArray::fetchConfig(  __DIR__ .'/rbac.json' ); /*load role based access control*/
		
		$role = isset($_SESSION['user']->role[APP])?$_SESSION['user']->role[APP]:2; //for demo, after it will be in profiles

		$authorizedMethods = array_key_exists($controllerName, $rbac[$role])? $rbac[$role][$controllerName]:$rbac[$role]['default'];
		
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