<?php 

namespace myApp\controllers;

use myApp\views\View;


class Post extends Base {


	function read( $data, $params = array() ) {
		View::render('postForm', $data, $params);
	}
	
	function create( $data ) {

	}
	
	function delete( $data  ) {

	}
	
	function update( $data  ) {

	}
	
}





?>