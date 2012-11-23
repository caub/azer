<?php 

namespace myApp\controllers;

use myApp\models\Bean;
use lib\database\Request;
use myApp\views\View;


class RegisterValidate extends Base {


	function read( $data, $params = array() ) {

		//completes registration process
		
		$request = new Request;
		$responsejSon = $request->create("v2/AuthenticationRequestHandler", $data);
			
		$responseObject = json_decode($responsejSon);
		debug('--');
		debug_r($responseObject);
		if ($responseObject->status==200){
			$params['notification'] = 'account validated';
		} else {
			$params['notification'] = $responseObject->description;
		}
		View::render('login', $data, $params);
		
	}
	
	function create( $data ) {	

	}
	
	function delete( $data  ) {
		
	}
	
	function update( $data  ) {

	}
	
}





?>