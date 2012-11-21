<?php

namespace myApp\controllers;


class Utils {
	
	
	static function formatPredicates($keys, $vals){
		$preds = array();
		
		foreach ($keys as $i=>$key){
			
			if (trim($key) !== ''){
				$preds[trim($key)][] = trim($vals[$i]);
			}
		}
		foreach($preds as $key=>$value){
			$preds[$key]=array_unique($preds[$key]);
			sort($preds[$key]);
		}
		ksort($preds);
		return $preds;
	}
	
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
	
	
	
}

?>