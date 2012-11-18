<?php 

namespace myApp\controllers;

use lib\database\Request;
use myApp\views\View;

class Profile {

	
	function read( $data, $params ) {
		
		debug_r($data);
		if (!isset($data['id'])){
			header('Location:/'.APP.'/profile/'.trim($_SESSION['user']->id));
		}

		// Building the Authentication request
		$request = new Request;
		$responsejSon = $request->read("v2/ProfileRequestHandler", $data);

		$responseObject = json_decode($responsejSon);
		debug('--');
		debug_r($responseObject);
		if ($responseObject->status==200){
			$data = (array) $responseObject->dataObject->user;
		}

		View::render('profile', $data, $params);
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