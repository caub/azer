<?php 

namespace myApp\controllers;


use myApp\views\View;

class Main {

	
	function read( $data ) {

		View::render('main', $data);
	}
	
	function create( $data ) {

	}
	function delete( $data ) {

	}
	function update( $data ) {

	}
	
	function error ( $data){
		$this->read($data, array('notification'=>'sorry but not authorized'));
	
	}
	
}





?>