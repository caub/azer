<?php 

namespace myApp\controllers;

use myApp\models\Bean;
use lib\database\Request;
use myApp\views\View;


class Login {


	function read( $data = array()) {
		
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