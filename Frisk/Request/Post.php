<?php
namespace Frisk\Request;
use Frisk\Util\Http as Http;

class Post extends \Frisk\Request
{
	private $_postValues = null;
	
	public function setParams($parameters)
	{
		$this->_postValues = $parameters;
		return $this;
	}
	public function getParams()
	{
		return $this->_postValues;
	}
	
	public function request()
	{
		$this->setType('POST');
		$url = $this->getUri();
		
		$httpRequest 	= new \HttpRequest($url,\HttpRequest::METH_POST);
		
		// add in the post data if we have some
		if($postValues = $this->getParams()){
			$httpRequest->addPostFields($postValues);
		}
		
		$httpResponse 	= $httpRequest->send();
		
		$this->setRequestObject($httpRequest);
		$this->setResponseObject($httpResponse);
	}
}
?>