<?php 

namespace myApp\controllers;


use myApp\models\Bean;
use lib\database\Request;
use myApp\views\View;

class Posts {

	function read( $data, $params = array() ) {
		debug_r($data);
		// Building the Authentication request
		$request = new Request;
		$responsejSon = $request->read("PublishHandler", $data);

		$responseObject = json_decode($responsejSon);

		if ($responseObject->status==200){
			$id = $data['id'];
			$data = (array) $responseObject->dataObject->details;
			$data['id'] = $id;
		} else {
			$params = array('notification'=>'no content');
		}

		View::render('posts', $data, $params);
	}
	
	function create( $data ) {
		
		//sanitize data
		$predicates = Utils::formatPredicates($data['keys'], $data['vals']);
		
		$data['predicates'] = json_encode(
			$predicates
		);
		$data['data'] = json_encode(
			array("text"=>$data['text'])
		);
		
		$data['metadata'] = json_encode(
			array(
				'user'=>$_SESSION['user']->id,
				'time'=>time()
			)
		);
		
		$data['user'] = $_SESSION['user']->id;
		
		//don't flood with useless params
		unset($data['keys']);
		unset($data['vals']);
		unset($data['text']);
		
		$request = new Request;
		$responsejSon = $request->create("PublishHandler", $data);
		
		$responseObject = json_decode($responsejSon);
		debug('--');
		debug_r($responseObject);
		if ($responseObject->status==200){
			$params = array('notification'=>'success');
		} else {
			$params = array('notification'=>$responseObject->description);
		}
		
		View::render('main', $data, $params);

	}
	function delete( $data ) {
		debug_r($data);
		
		// Building the Authentication request
		$request = new Request;
		$responsejSon = $request->delete("PublishHandler", $data);
		
		$responseObject = json_decode($responsejSon);
		debug('--');
		debug_r($responseObject);
		if ($responseObject->status==200){
			header("Location: /".APP."/posts/".$data['id']);
			exit();
		} else {
			$params = array('notification'=>'no content');
			View::render('posts', $data, $params);
		}
		
	}
	function update( $data ) {

	}
	
	function error ( $data){
		$this->read($data, array('notification'=>'sorry but not authorized'));

	}
	
}





?>