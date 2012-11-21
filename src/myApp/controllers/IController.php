<?php

namespace myApp\controllers;


interface IController {
	
	function read( $data, $params = array() );
	
	function create( $data );
	
	function delete( $data );
	
	function update( $data );
	
	function error ( $data);
	
	function errorAuthentication ( $data);
	
}