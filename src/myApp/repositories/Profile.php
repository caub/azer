<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use myApp\views\View;

class Profile extends Base {

	
	function read( $data, $other = array() ) {
		
		if (!isset($data['id'])){
			$data['id'] = $_SESSION['user']->id;
		}

		$request = new BackendRequest;
		$responsejSon = $request->read("v2/ProfileRequestHandler", $data);

		$responseObject = json_decode($responsejSon);
		debug('--');
		//debug_r($responseObject);
		if ($responseObject->status==200){
			$data = (array) $responseObject->dataObject->user;
		}
		View::render('profile', $data, $other);

	}
	
}





?>