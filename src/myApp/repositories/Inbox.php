<?php 

namespace myApp\repositories;

use lib\database\CoreRequest;
use lib\database\BackendRequest;
use myApp\views\View;


class Inbox extends Base {


	function read( $data, $params = array() ) {
		
		$request = new BackendRequest;
		$responsejSon = $request->read("PublishHandler", array('id' => 'inbox', 'reversed'=>'true'));
		$responseObject = json_decode($responsejSon);
		
		if ($responseObject->status==200){
			$data = (array) $responseObject->dataObject->details;
			debug_r($data);
			unset($data['keywords']);
		} else {
		}
		View::render('inbox', $data);
	}
	
	function create( $data ) {

		
		debug_r($data);
		
		
		$data['date'] = date("Y-m-d H:i:s");
		$request = new CoreRequest('138.96.242.20');
		$request->sendPost('inbox/post', $data);
		
		$d = array('id' => 'inbox');
		$d['data'] = json_encode(array($data['date'].': '.$data['user'] => json_encode($data)));
		$d['metadata'] = '{}';
		$d['predicates'] = '[]';
		$d['notify'] = 'false';
		
		$request = new BackendRequest;
		$responsejSon = $request->create("PublishHandler", $d);
		$responseObject = json_decode($responsejSon);
		debug('--');
		debug_r($responseObject);
		if ($responseObject->status==200){
			debug('-ok-');
		} else {

		}
		
	}
	
}





?>