<?php

namespace myApp\accessControl;


/*
 *  Access Control
 */

class Main extends Authenticated {
	

	public function __call( $method, $arguments ){
		parent::__call($method, $arguments);
		//debug_r($this->getAuthorizedMethods());
		if ( method_exists( $this->target, $method) && in_array($method, $this->getAuthorizedMethods()) ){
			
			return call_user_func_array(
				array( $this->target, $method ),
				$arguments
			);
		} else {
			//debug_r($arguments);
			$this->target->error($arguments[0]);
		}
	}
	
	private function getAuthorizedMethods(){

		return array_key_exists($this->targetName, $this->acl)? $this->acl[$this->targetName]:$this->acl['default'];
	}
	
}
