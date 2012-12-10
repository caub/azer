<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use myApp\views\View;


class Login extends Base {


	function read( $data = array(), $params = array() ) {

		if ($_SERVER['REQUEST_METHOD'] == "POST") { //Auth attempt
			if ( !empty($data['password']) ){
				$data['login']	= trim($data['login']);
				$data['password']	= hash("sha512", $data['password']); //at least salt..
			
				$request = new BackendRequest();
				$responsejSon = $request->read("v2/AuthenticationRequestHandler", $data);
			
				$responseObject = json_decode($responsejSon);
				debug('--');
				debug_r($responseObject);
				if ($responseObject->status==200){
					$data = array('id' => $responseObject->dataObject->user);
					$_SESSION['accessToken'] = $responseObject->dataObject->accessToken;
			
					$responsejSon = $request->read("v2/ProfileRequestHandler", $data);
					$responseObject = json_decode($responsejSon);
					debug('--');
					debug_r($responseObject);
					if ($responseObject->status==200){
						$_SESSION['user'] = (object) array_map('trim', (array) $responseObject->dataObject->user);
						$_SESSION['accessControl'] = array('read', 'create', 'update', 'delete');
						header("Location: /".APP);
						exit();
					}
			
				}
				$params['notification'] = 'fail!';
				View::render('login', $data, $params);
			} else {
				$params['notification'] = 'password..';
				View::render('login', $data, $params);
			}
		} else {
			View::render('login', $data);
		}
		
	}
	
	function create( $data ) {

	}
	
	function delete( $data  ) {

	}
	
	function update( $data  ) {

	}
	
}





?>