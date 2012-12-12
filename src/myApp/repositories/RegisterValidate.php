<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use myApp\views\View;


class RegisterValidate extends Base {


	function read( $data, $other = array() ) {

		//completes registration process
		
		$request = new BackendRequest;
		$responsejSon = $request->create("v2/AuthenticationRequestHandler", $data);
			
		$responseObject = json_decode($responsejSon);
		debug('--');
		debug_r($responseObject);
		if ($responseObject->status==200){
			$other['notification'] = 'account validated';
		} else {
			$other['notification'] = $responseObject->description;
		}
		View::render('login', $data, $other);
		
	}
	
}





?>