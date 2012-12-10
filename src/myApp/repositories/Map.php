<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use myApp\views\View;


class Map extends Base {


	function read( $data, $params = array() ) {
		View::render('map', $data);
	}
	
	function create( $data ) {

	}
	
	function delete( $data  ) {

	}
	
	function update( $data  ) {

	}
	
}





?>