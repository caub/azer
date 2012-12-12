<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use myApp\views\View;


class Logout extends Base {


	function read( $data, $other = array() ) {
		
		$request = new BackendRequest();
		$responsejSon = $request->delete("v2/SessionRequestHandler", $data);
		
		session_destroy();
		unset($_SESSION['user']);
				
		View::render('login', $data);
		
	}
	
}





?>