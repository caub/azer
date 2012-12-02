<?php 

namespace myApp\controllers;

use myApp\models\Bean;
use lib\database\Request;
use myApp\views\View;


class Test extends Base {


	function read( $data, $params = array() ) {
		View::render('test', $data);
		
		
	}
	
	function create( $data ) {

	}
	
	function delete( $data  ) {

	}
	
	function update( $data  ) {

	}
	
}





?>