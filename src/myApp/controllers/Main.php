<?php 

namespace myApp\controllers;


use myApp\views\View;

class Main extends Base {

	
	function read( $data, $params = array() ) {

		View::render('main', $data, $params);
	}
	
	function create( $data ) {

	}
	function delete( $data ) {

	}
	function update( $data ) {

	}

	
}





?>