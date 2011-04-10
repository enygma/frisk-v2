<?php
namespace Frisk\Request;
use Frisk\Util\Http as Http;

class Get extends \Frisk\Request
{
	public function request()
	{
		$this->setType('GET');
		
		//print_r($this->getParams());
		$params = $this->getParams(true);
		print_r($params);
		
		$url = $this->getUri().'/?'.$params;
		echo $url;
		
		echo 'request!';
		
		$httpRequest 	= new \HttpRequest($url,\HttpRequest::METH_GET);
		$httpResponse 	= $httpRequest->send();
		
		var_dump($httpRequest);
		
		$this->setRequestObject($httpRequest);
		$this->setResponseObject($httpResponse);
		
		var_dump($httpResponse);
		
	}
}

?>
