<?php
namespace Frisk\Assert;
use Frisk\Assert as Assert;

class Contains extends Assert
{
	private $_type 			= 'contains';
	private $_caseSensitive	= true;
	
	public function setCaseSensitive($bool)
	{
		if($bool !== true && $bool !== false){
			throw new Exception('Case sensitive value must be a boolean!');
		}
		$this->$_caseSensitive = $bool;
		return $this;
	}
	public function getCaseSensitive()
	{
		return $this->_caseSensitive;
	}
	
	/**
	 * Check the given request's response to see if it contains the string
	 */
	public function assert($request,$containsString)
	{
		$content 	= $request->_responseObject->getBody();
		$status 	= ($this->_caseSensitive===true) ? (bool)strpos($content,$containsString) : (bool)stripos($content,$containsString);
		
		($status==true) ? $this->setPass(true) : $this->setPass(false);
	}
	
}

?>