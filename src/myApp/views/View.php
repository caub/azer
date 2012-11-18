<?php 

namespace myApp\views;


class View {
	
	//public $templates;
	
	/*
	$view = new \myApp\views\View(
		array('main'=>array(
			'foo'=>'bar')
		)
	);
	*/
	
	/*function __construct($templates) {
		$this->templates = $templates;
	}
	
	function render() {

		include 'templates/header.php';
		foreach ($this->templates as $file => $vars){
			include 'templates/' . $file . '.php';
		}
		include 'templates/footer.php';
	}*/
	
	static function render($viewName, $data = array(), $params = array()){ 
		include __DIR__ . '/parts/tabbar.php';
		include __DIR__ . '/' .ucwords($viewName). '.php';
		exit();
	}
	
}


?>