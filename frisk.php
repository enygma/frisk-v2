#!/usr/bin/php
<?php
namespace Frisk;

use Frisk\Util\Http as Http;
use Frisk\Request as Request;

require_once __NAMESPACE__.'/Util/Autoload.php';
spl_autoload_register(array(__NAMESPACE__.'\Util\Autoload','load'));


// build a request object
$request = new Request\Get();
$request->setUri('http://google.com')
	->setParams(array('q'=>'php'))
	->request();

print_r($request);

$request = new Request\Post();
$request->setUri('http://talkingpixels.org')
	->setParams(array())
	->request();
	
print_r($request);

// pass it off to the http 

?>