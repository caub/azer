<?php

namespace myApp\accessControl;

/*
 * targetted controller
 */


class Main {
	
	protected $authorizedMethods = null;
	protected $acl = null;
	
	public function __construct( $target, $authorizedMethods){
		$this->target = $target;
		$this->authorizedMethods = $authorizedMethods;
	
	}
	
	public function __call( $method, $arguments ){

		//debug_r($this->getAuthorizedMethods());
		if ( is_callable( $this->target, $method) && in_array($method, $this->authorizedMethods) ){
			
			return call_user_func_array(
				array( $this->target, $method ),
				$arguments
			);
		} else {
			//debug_r($arguments);
			$this->target->error($arguments[0]);
		}
	}
	
}
