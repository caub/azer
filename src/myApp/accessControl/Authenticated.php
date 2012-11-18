<?php

namespace myApp\accessControl;

use myApp\views\View;

/*
 *  Access Control
 */

class Authenticated {
	
	/*
	 * targetted controller
	 */
	protected $target = null;
	protected $acl = null;
	
	public function __construct( $target, $accessControlList){	
		$this->target = $target;
		$this->acl = $accessControlList;
		
		$parts =  explode('\\', get_class($this->target));
		$this->targetName = array_pop($parts);
	}

	public function __call( $method, $arguments ){
		
		$parts =  explode('\\', get_class($this->target));
		$controllerName = array_pop($parts);
		
		if (!isset($_SESSION['user']) && $this->targetName !== 'Authentication'){
			View::render('login');
		}
	}
	
}
