<?php
namespace Frisk;

/**
 * Assertion base class
 *
 * @package frisk-v2
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 */
class Assert {

	/**
	 * Assertion type
	 * @var string
	 */
	private $_type		= null;
	
	/**
	 * Pass/fail status
	 * @var bool
	 */
	private $_status	= false;

	/**
	 * Assertion method
	 *
	 * @return null
	 */
	public function assert(){}
	
	/**
	 * Set Pass/Fail status
	 * 
	 * @param bool $status Pass/Fail status
	 * @return null
	 */	
	public function setStatus($status)
	{
		if(!is_bool($status)){
			throw new Exception('Status must be boolean!');
		}
		$this->_passFail = $status;
	}
	
	/**
	 * Get the current pass/fail status
	 * 
	 * @return bool $_passFail Pass/fail status
	 */
	public function getStatus()
	{
		return $this->_passFail;
	}
}

?>
