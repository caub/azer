<?php 

namespace myApp\controllers;

use myApp\models\Bean;
use lib\database\BackendRequest;
use myApp\views\View;


class Main extends Base {

	
	function read( $data, $params = array() ) {

		$request = new BackendRequest;
		$responsejSon = $request->read("v2/ProfileRequestHandler", array('id' => $_SESSION['user']->id) );
		$responseObject = json_decode($responsejSon);
		if ($responseObject->status==200){
			$data = (array) $responseObject->dataObject->user;
		}
		
		View::render('main', $data, $params);
		
	}
	
	function create( $data ) {

	}
	function delete( $data ) {

	}
	function update( $data ) {

	}

	
}





?>