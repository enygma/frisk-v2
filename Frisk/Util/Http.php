<?php
namespace Frisk\Util;

abstract class Http
{
	protected $_uri 				= null;
	protected $_validRequestTypes 	= array('GET','POST','PUT');
	protected $_params				= array();
	protected $_response			= null;
	
	
	abstract function request();
}

?>
