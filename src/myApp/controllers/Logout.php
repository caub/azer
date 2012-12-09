<?php 

namespace myApp\controllers;

use lib\database\BackendRequest;
use myApp\views\View;


class Logout extends Base {


	function read( $data, $params = array() ) {
		
		$request = new BackendRequest();
		$responsejSon = $request->delete("v2/SessionRequestHandler", $data);
		
		session_destroy();
		unset($_SESSION['user']);
				
		View::render('login', $data);
		
	}
	
	function create( $data ) {

	}
	
	function delete( $data  ) {

	}
	
	function update( $data  ) {

	}
	
}





?>