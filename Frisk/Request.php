<?php
namespace Frisk;
use Frisk\Util\Http as Http;

class Request extends Http
{
	private $_type 				= null;
	private $_requestObject 	= null;
	private $_responseObject 	= null;
	
	## Getters and Setters ####################
	public function setType($requestType)
	{
		$requestType = strtoupper($requestType);
		if(!in_array($requestType,$this->_validRequestTypes)){
			throw new \Exception('Invalid request type of "'.$requestType.'"');
		}else{
			$this->_type = $requestType;
		}
		return $this;
	}
	public function getType()
	{
		return $this->_type;
	}
	public function setUri($uri)
	{
		$this->_uri = $uri;
		return $this;
	}
	public function getUri()
	{
		return $this->_uri;
	}
	public function setParams($params)
	{
		$this->_params = $params;
		return $this;
	}
	public function getParams($asString = true)
	{
		if($asString){
			$paramString = array();
			if(count($this->_params)>0){
				foreach($this->_params as $key => $value){
					$paramString[] = $key.'='.urlencode($value);
				}
			}
			return implode('&',$paramString);
		}else{
			return $this->_params;
		}
	}
	public function setResponseObject($responseObject)
	{
		if($responseObject instanceof \HttpMessage){
			$this->_responseObject = $responseObject;
		}else{
			throw new \Exception('Incorrect type for response object. Must be HttpMessage');
		}
		return $this;
	}
	public function getResponseObject()
	{
		return $this->_responseObject;
	}
	public function setRequestObject($requestObject)
	{
		if($requestObject instanceof \HttpRequest){
			$this->_requestObject = $requestObject;
		}else{
			throw new \Exception('Incorrect type for request object. Must be HttpRequest');
		}
		return $this;
	}
	public function getRequestObject()
	{
		return $this->_requestObject;
	}
	
	## Main methods ###########################
	public function __call($name,$value)
	{
		echo $name;
		
		return $this;
	}
	public function __construct($options=null)
	{
		var_dump($options);
		//$requestObject = new Http\Get();
		//var_dump($requestObject);
	}
	public function request()
	{
		
	}
}

?>