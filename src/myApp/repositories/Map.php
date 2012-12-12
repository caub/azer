<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use myApp\views\View;


class Map extends Base {


	function read( $data, $other = array() ) {
		View::render('map', $data);
	}
	
}





?>