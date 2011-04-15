<?php
namespace Frisk\Request;
use Frisk\Util\Http as Http;

/**
 * GET Request handling class
 *
 * @package frisk-v2
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 */
class Get extends \Frisk\Request
{
	/**
	 * Make the GET request
	 */
	public function request()
	{
		$this->setType('GET');
		
		$params 		= $this->getParams(true);		
		$url 			= $this->getUri().'/?'.$params;

		$httpRequest 	= new \HttpRequest($url,\HttpRequest::METH_GET);
		$httpResponse 	= $httpRequest->send();
		
		//var_dump($httpRequest);
		
		$this->setRequestObject($httpRequest);
		$this->setResponseObject($httpResponse);
		
		//var_dump($httpResponse);
		
	}
}

?>
