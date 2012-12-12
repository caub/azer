<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use lib\utils\Utils;
use myApp\views\View;

class Posts extends Base {

	function read( $data, $params = array() ) {

		debug_r($data);
		// Building the Authentication request
		$request = new BackendRequest;
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
		$predicates = Utils::parseQuery($data['q']);
		
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
		
		$request = new BackendRequest;
		$responsejSon = $request->create("PublishHandler", $data);
		
		$responseObject = json_decode($responsejSon);
		debug('--');
		debug_r($responseObject);
		if ($responseObject->status==200){
			$params = array('notification'=>'success');
			header("Location: /".APP.'/posts/'.$responseObject->dataObject->id);
			exit();
		} else {
			$params = array('notification'=>$responseObject->description);
		}
		

	}
	function delete( $data ) {
		debug_r($data);
		
		// Building the Authentication request
		$request = new BackendRequest;
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
	
}





?>