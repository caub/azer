<?php 

namespace myApp\controllers;


//use myApp\views\View;

class Base implements IController{

	
	function read( $data, $params = array() ) {
	}
	
	function create( $data ) {
	}
	
	function delete( $data ) {
	}
	
	function update( $data ) {
	}
	
	function errorAuthentication ( $data){
		//$this->read($data, array('notification'=>'please log in'));
		header('Location: ./'.APP.'/login');
		
	}
	function error ( $data){
		$this->read($data, array('notification'=>'sorry but not authorized'));
	}
	
	
}





?>