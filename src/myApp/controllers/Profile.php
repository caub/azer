<?php 

namespace myApp\controllers;

use lib\database\Request;
use myApp\views\View;

class Profile extends Base {

	
	function read( $data, $params = array() ) {
		
		if (!isset($data['id'])){
			$data['id'] = $_SESSION['user']->id;
			//header('Location:/'.APP.'/profile/'.trim($_SESSION['user']->id));
		}

		// Building the Authentication request
		$request = new Request;
		$responsejSon = $request->read("v2/ProfileRequestHandler", $data);

		$responseObject = json_decode($responsejSon);
		debug('--');
		//debug_r($responseObject);
		if ($responseObject->status==200){
			$data = (array) $responseObject->dataObject->user;
		}

		if (trim($data['id']) == trim($_SESSION['user']->id)){
			View::render('myProfile', $data, $params);
		} else {
			View::render('profile', $data, $params);
		}
	}
	
	function create( $data ) {
		
	}
	
	function delete( $data ) {

	}
	function update( $data ) {

	}
	
	
}





?>