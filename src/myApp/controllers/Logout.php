<?php 

namespace myApp\controllers;

use lib\database\Request;
use myApp\views\View;


class Logout extends Base {


	function read( $data, $params = array() ) {
		
		$request = new Request();
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