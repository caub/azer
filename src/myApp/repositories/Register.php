<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use myApp\views\View;


class Register extends Base {


	function read( $data, $params = array() ) {
		View::render('register', $data);
		
		
	}
	
	function create( $data ) {
		
			if ( !empty($data['email']) && !empty($data['password'])){ //Register attempt
			
			$data['email'] = strtolower(trim($data['email']));
			$data['id'] = "MYMED_" . $data['email'];
			$data['name'] = $data['email'];//$data['firstName'] . " " . $data['lastName'];
				
			// create the authentication
			$auth = array();
			$auth['login'] = $data['email'];
			$auth['user'] = $data['id'];
			$auth['password'] = hash('sha512', $data['password']); //SALT
			
			$code = $data['code'];
			unset($data['code']);
			unset($data['password']);
			
			$request = new BackendRequest();
			$responsejSon = $request->create("v2/AuthenticationRequestHandler", 
				array(
					'application' => APPLICATION_NAME,
					'code' => $code,
					'user' => json_encode($data),
					'authentication' => json_encode($auth)
				)
			);
			
			$responseObject = json_decode($responsejSon);
			debug('--');
			debug_r($responseObject);
			if ($responseObject->status==200){
				$params['notification'] = 'check your emails';
			} else {
				$params['notification'] = 'try again';
			}
			View::render('login', $data, $params);
		} else {
			$params['notification'] = 'no empty fields please';
			View::render('register', $data, $params);
		}
		

	}
	
	function delete( $data  ) {

	}
	
	function update( $data  ) {

	}
	
}





?>