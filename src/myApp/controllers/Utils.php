<?php

namespace myApp\controllers;


class Utils {
	
	
	static function parseQuery($q){
		$parts = explode('|', $q);
		
		$res = array();
		
		foreach ($parts as $predmap){
			$p = array();
			$preds = explode('&', $predmap);
			foreach ($preds as $item){
				$keyvalue = explode('=', $item);
				if (trim($keyvalue[0]) !== ''){
					$p[trim($keyvalue[0])][] = trim($keyvalue[1]);
				}
			}
			
			foreach($p as $key=>$value){
				$p[$key]=array_unique($p[$key]);
				sort($p[$key]);
			}
			ksort($p);
			$res[] = $p;
		}
		debug_r($res);
		return $res;
	}
	
	static function sortByTime($a, $b){
		return $a->time < $b->time;
	}
	
	
	
}

?>