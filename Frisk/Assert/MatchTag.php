<?php
namespace Frisk\Assert;
use Frisk\Assert as Assert;

/**
 * Assertion to check the response for a certain string
 * in a given tag.
 *
 * @package frisk-v2
 * @subpackage assertions
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 */
class MatchTag extends Assert
{
	/**
	 * Type of the assertion
	 * @var string
	 */
	private $_type = 'matchtag';
	
	public function assert($request,$parameters)
	{
		if(count($parameters)!=2){
			throw new Exception('Incorrect number of parameters for tag match assertion!');
		}
		
		/* TODO: parse the page to look for the HTML tag given */
		
		$this->setStatus(false);
	}
	
}