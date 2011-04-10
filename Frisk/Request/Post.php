<?php
namespace Frisk\Request;
use Frisk\Util\Http as Http;

class Post extends \Frisk\Request
{
	public function request()
	{
		$this->setType('POST');
		
		echo 'post request';
	}
}
?>