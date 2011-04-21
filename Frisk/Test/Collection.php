<?php
namespace Frisk\Test;

class Collection implements \Iterator
{
	private $_testSet = array();
	
	public function __construct()
	{
		//nothing here
	}
	
	public function rewind(){}
	public function current(){}
	public function key(){}
	public function next(){}
	public function valid(){}
	
	public function add($test)
	{
		$this->_testSetp[] = $test;
	}
}