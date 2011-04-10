<?php
namespace Frisk\Util;

class Autoload
{
	public static function load($className)
	{
		require_once str_replace('\\','/',$className).'.php';
	}
}

?>
