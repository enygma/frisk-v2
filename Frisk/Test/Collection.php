<?php
namespace Frisk\Test;

class Collection implements \ArrayAccess,\IteratorAggregate
{
	private $_testSet = array();
	
	public function __construct()
	{
		//nothing here
	}
	
	// -------------------------------
	// Iterator methods
	
	public function offsetGet($offset)
	{
		return (isset($this->_testSet[$offset])) ? $this->_testSet[$offset] : null;
	}
	public function offsetSet($offset,$value)
	{
		$this->_testSet[] = $value;
	}
	public function offsetUnset($offset)
	{
		if(isset($this->_testSet[$offset])){ unset($this->_testSet[$offset]); }
	}
	public function offsetExists($offset)
	{
		return (isset($this->_testSet[$offset])) ? true : false;
	}
	public function getIterator()
	{
		return new \ArrayIterator($this->_testSet);
	}
	
	// --------------------------------
	// Custom methods
	
	public function add($test)
	{
		$this->offsetSet(null,$test);
	}
}
