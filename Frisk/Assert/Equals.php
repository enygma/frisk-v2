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
class Equals extends Assert
{
	/**
	 * Type of the assertion
	 * @var string
	 */
	private $_type = 'equals';
	
	/**
	 * Check to see if response to request matches string exactly
	 *
	 * @param object $request HttpMessage object
	 * @param string $matchString String for exact match
	 *
	 * @return null
	 */
	public function assert($request,$matchString)
	{
		$content = $request->_responseObject->getBody();
		$this->setStatus( ($content===$matchString) ? true : false);
	}
	
}

?>