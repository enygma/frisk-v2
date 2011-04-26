<?php
namespace Frisk;

/**
 * Base test class
 * 
 * @package frisk-v2
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 */
class Test implements \ArrayAccess,\IteratorAggregate
{
	private $_requestSet = array();

	public function __construct()
	{
		//nothing yet
	}

	// ----------------------
	// Iterator methods
	
	public function offsetGet($offset)
        {
                return (isset($this->_requestSet[$offset])) ? $this->_requestSet[$offset] : null;
        }
        public function offsetSet($offset,$value)
        {
                $this->_requestSet[] = $value;
        }
        public function offsetUnset($offset)
        {
                if(isset($this->_requestSet[$offset])){ unset($this->_requestSet[$offset]); }
        }
        public function offsetExists($offset)
        {
                return (isset($this->_requestSet[$offset])) ? true : false;
        }
        public function getIterator()
        {
                return new \ArrayIterator($this->_requestSet);
        }

        // --------------------------------
        // Custom methods

	public function loadRequestsFromFile($testFilePath)
	{
		if(is_file($testFilePath)){
			// load in our file, grab the class name and reflect on it
			$testFileContents = file_get_contents($testFilePath);
			if(preg_match('/class (.*?) extends Test/',strtolower($testFileContents),$classDetailMatch)){
				require_once($testFilePath);
				// our class name should be in $classDetailMatch[1]

				$reflectClass = new ReflectionClass($classDetailMatch[1]);
				$methods = $reflectClass->getMethods();
				$testInstace = new $classDetailMatch();

				// loop through the methods, find the test*
				foreach($methods as $method){
					if(substr($method->name,0,4) == 'test'){
						echo $method->name."\n";	
					}
				}
				
			}else{
				throw new Exception('Class file invalid: '.$testFilePath);
			}
		}else{
			throw new Exception('Cannot read test file: '.$testFilePath);
		}
	}
	
}

?>
