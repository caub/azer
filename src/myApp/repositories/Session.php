<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use myApp\views\View;


class Session extends Base {


	function read( $data, $params = array() ) {
		echo $_SESSION[$data['id']];
	}
	
}





?>