<?php
namespace Frisk\Assert;
use Frisk\Assert as Assert;

/**
 * Assertion to check the response for a certain string
 *
 * @package frisk-v2
 * @subpackage assertions
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 */
class Contains extends Assert
{
	/**
	 * Type of the assertion
	 * @var string
	 */
	private $_type 			= 'contains';
	
	/**
	 * Case-sensitive setting
	 * @var bool
	 */
	private $_caseSensitive	= true;
	
	/**
	 * Set the case-sensitive setting for this assertion
	 *
	 * @param bool $bool Case-sensitive toggle
	 */
	public function setCaseSensitive($bool)
	{
		if($bool !== true && $bool !== false){
			throw new Exception('Case sensitive value must be a boolean!');
		}
		$this->$_caseSensitive = $bool;
		return $this;
	}
	
	/**
	 * Return the case-sensitive setting for the current assertion
	 *
	 * @return bool $_caseSensitive Case-sensitive toggle
	 */
	public function getCaseSensitive()
	{
		return $this->_caseSensitive;
	}
	
	/**
	 * Check the given request's response to see if it contains the string
	 *
	 * @param object $request HttpMessage object
	 * @param string $containsString String to check body content for
	 * @return null
	 */
	public function assert($request,$containsString)
	{
		$content 	= $request->_responseObject->getBody();
		$status 	= ($this->_caseSensitive===true) ? (bool)strpos($content,$containsString) : (bool)stripos($content,$containsString);
		
		($status==true) ? $this->setStatus(true) : $this->setStatus(false);
	}
	
}

?>