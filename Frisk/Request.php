<?php
namespace Frisk;
use Frisk\Util\Http as Http;

/**
 * Request base class, extends HTTP abstract class
 *
 * @package frisk-v2
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 */
class Request extends Http
{
	/**
	 * Request type (ex. GET, POST, PUT)
	 * @var string
	 */
	private $_type 				= null;
	
	/**
	 * Request object (http)
	 * @var object
	 */
	private $_requestObject 	= null;
	
	/**
	 * Response object (http)
	 * @var object
	 */
	private $_responseObject 	= null;
	
	## Getters and Setters ####################
	
	/**
	 * Set request type
	 *
	 * @param string $requestType Request type
	 * @return object $this Current object
	 */
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
	
	/**
	 * Get current request type
	 *
	 * @return string $_type Request type
	 */
	public function getType()
	{
		return $this->_type;
	}
	
	/**
	 * Set request location
	 *
	 * @param string $uri URL location
	 * @return object $this Current object
	 */
	public function setUri($uri)
	{
		$this->_uri = $uri;
		return $this;
	}
	
	/**
	 * Get current request location
	 *
	 * @return string $_uri Current location
	 */
	public function getUri()
	{
		return $this->_uri;
	}
	
	/**
	 * Set request paramaters
	 *
	 * @param mixed $params Parameters to send (string or array)
	 * @return object $this Current object
	 */
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
	
	/**
	 * Set the current request object
	 *
	 * @param object $requestObject HttpRequest
	 * @return object $this Current object
	 */
	public function setRequestObject($requestObject)
	{
		if($requestObject instanceof \HttpRequest){
			$this->_requestObject = $requestObject;
		}else{
			throw new \Exception('Incorrect type for request object. Must be HttpRequest');
		}
		return $this;
	}
	
	/**
	 * Return the current request object
	 *
	 * @return object HttpMessage object
	 */
	public function getRequestObject()
	{
		return $this->_requestObject;
	}
	
	/**
	 * Get the body content of the request's response
	 *
	 * @return string Response body
	 */
	public function getResponseBody()
	{
		if($this->_responseObject == null){
			throw new Exception('Request object not set!');
		}
		return $this->_responseObject->getBody();
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