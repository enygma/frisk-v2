<?php
namespace Frisk;

class Assert {

	private $_type		= null;
	private $_passFail	= false;

	public function assert(){}
		
	public function setPass($status)
	{
		$this->_passFail = $status;
	}
	public function getPass()
	{
		return $this->_passFail;
	}
}

?>
