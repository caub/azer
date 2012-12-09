<?php

namespace lib\database;

/*
 * uses curl
 */


class CoreRequest {
	
	protected $serviceUrl = null;
	
	function __construct($serviceUrl) {
		
		$this->serviceUrl = $serviceUrl;

		//lazy init
		$this->curl	= curl_init();
		if($this->curl === false) {
			trigger_error('Unable to init CURL : ', E_USER_ERROR);
		}
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_HTTPHEADER, array('Content-Type:application/x-www-form-urlencoded'));
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($this->curl, CURLOPT_CAINFO, "/etc/ssl/certs/mymed.crt");

		
	}

	
	function create($ressource, $data){
		$data = $this->setServiceParams($data, __METHOD__);
		return $this->sendPost($ressource, $data);
	}
	function read($ressource, $data){
		$data = $this->setServiceParams($data, __METHOD__);
		return $this->sendGet($ressource, $data);
	}
	function update($ressource, $data){
		$data = $this->setServiceParams($data, __METHOD__);
		return $this->sendPost($ressource, $data);
	}
	function delete($ressource, $data){
		$data = $this->setServiceParams($data, __METHOD__);
		return $this->sendGet($ressource, $data);
	}
	
	function sendGet($ressource, $data) {
		curl_setopt($this->curl, CURLOPT_URL, $this->serviceUrl.'/'.$ressource . '?'.http_build_query($data));
		
		$result = curl_exec($this->curl);
		if ($result === false) {
			throw new Exception("CURL Error : " . curl_error($this->curl));
		}
		return $result;
	}
	
	function sendPost($ressource, $data) {
		curl_setopt($this->curl, CURLOPT_URL, $this->serviceUrl .'/'. $ressource);
		curl_setopt($this->curl, CURLOPT_POST, true);
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($data));
		$result = curl_exec($this->curl);
		if ($result === false) {
			throw new Exception("CURL Error : " . curl_error($this->curl));
		}
		return $result;
	}
	
	
	
	function setServiceParams($data, $methodPath) { //Service specific params
		if(isset($_SESSION['accessToken']) && !isset($data['accessToken'])) {
			$data['accessToken'] = $_SESSION['accessToken'];
		}
		$data['application'] = APPLICATION_NAME;

		$parts = explode('::', $methodPath);
		$method= $parts[1];
		$codes = array(
			'create' => 0,
			'read'   => 1,
			'update' => 2,
			'delete' => 3
		);
		$data['code'] = $codes[$method];
		return $data;
	}
	
	

	
}
?>
