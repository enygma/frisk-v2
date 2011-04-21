#!/usr/bin/php
<?php
namespace Frisk;

use Frisk\Util\Http as Http;
use Frisk\Request as Request;

error_reporting(E_ALL);

require_once __NAMESPACE__.'/Util/Autoload.php';
spl_autoload_register(array(__NAMESPACE__.'\Util\Autoload','load'));


// build a request object
$request = new Request\Get();
$request->setUri('http://google.com')
	->setParams(array('q'=>'php'))
	->request();

//print_r($request);

$request = new Request\Post();
$request->setUri('http://talkingpixels.org/index.php')
	->setParams(array('test'=>'one'))
	->request();
	
echo 'response: '; print_r($request->getResponseBody());
echo "\n\n";

$contains = new Assert\Contains();
$contains->assert($request,'pixeh');

print_r($contains);
var_dump($contains->getStatus());

$contains = new Assert\Equals();
$contains->assert($request,'talkingpixels.org');

print_r($contains);
var_dump($contains->getStatus());

$match = new Assert\MatchTag();
$match->assert($request,array('title','testing'));

print_r($match);
var_dump($match->getStatus());

echo "\n\n";
//-----------------------------------------------
echo "### Tests #########\n";
class Test1 extends Test
{
	public function testMyFirst()
	{
		
	}
}
$test = new Test1();
//var_dump($test);

//$tests = new Test\Collection();
//$tests = null;

$runner = new Runner();
$runner->addTest($test);
$runner->runTests();

echo 'runner obj: '; var_dump($runner);

echo "\n\n";
//-----------------------------------------------


//-----------------------
die();
$assertions = array(
	new Assert(),
	new Assert()
);

$test = new Test($request,$assertions);
//-----------------------

?>