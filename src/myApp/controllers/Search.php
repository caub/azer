<?php 

namespace myApp\controllers;

use myApp\models\Bean;
use lib\database\Request;
use myApp\views\View;


class Search extends Base {


	function read( $data, $params = array() ) {
		debug('gsrg');

		//sanitize data

		$predicates = Utils::parseQuery($data['q']);

		$data['predicates'] = json_encode($predicates);
		debug_r($data['predicates']);
		
		$params = array();
		$params['predicates'] = $predicates;
		$params['title'] = $data['q'];
		
		//don't flood with useless params
		unset($data['q']);
		
		$request = new Request;
		$responsejSon = $request->read("PublishHandler", $data);

		$responseObject = json_decode($responsejSon);
		debug('--');
		debug_r($responseObject);
		if ($responseObject->status==200){
			$data = (array) $responseObject->dataObject->results;
		} else {
			$data = array();
			$params['notification']='no results';
		}

		View::render('results', $data, $params);
		
	}
	
	function create( $data ) {

	}
	
	function delete( $data  ) {

	}
	
	function update( $data  ) {

	}

	
}





?>