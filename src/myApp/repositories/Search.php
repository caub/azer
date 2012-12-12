<?php 

namespace myApp\repositories;

use lib\database\BackendRequest;
use lib\utils\Utils;
use myApp\views\View;


class Search extends Base {


	function read( $data, $params = array() ) {
		debug('gsrg');

		date_default_timezone_set ('Europe/Paris');

		//sanitize data
		$predicates = Utils::parseQuery($data['q']);

		$data['predicates'] = json_encode($predicates);
		debug_r($data['predicates']);
		
		$params = array();
		$params['predicates'] = $predicates;
		$params['title'] = $data['q'];
		
		//don't flood with useless params
		unset($data['q']);
		
		$request = new BackendRequest;
		$responsejSon = $request->read("PublishHandler", $data);

		$responseObject = json_decode($responsejSon);
		debug('--');
		//debug_r($responseObject);
		if ($responseObject->status==200){
			$data = (array) $responseObject->dataObject->results;
			usort($data, 'lib\utils\Utils::sortByTime');
			
		} else {
			$data = array();
			$params['notification']='no results';
		}

		View::render('results', $data, $params);
		
	}

	
}





?>