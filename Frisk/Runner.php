<?php
namespace Frisk;

/**
 * Base test class
 * 
 * @package frisk-v2
 * @author Chris Cornutt <ccornutt@phpdeveloper.org>
 */
class Runner
{
	/**
	 * Current tests directory
	 * @var string
	 */
	private $_testDirectory 	= null;
	
	private $_testCollection 	= null;
	
	//---------------------
	
	public function __construct($testCollection=null)
	{
		// go through our set of tests
		if($testCollection!=null){
			$this->_testCollection = $testCollection;
		}else{
			$this->_testCollection = new Test\Collection();
		}
	}

	/**
	 * Set the current tests directory
	 *
	 * @param string $testDirectory Test directory
	 * @return null
	 */
	public function setTestDirectory($testDirectory)
	{
		if(is_dir($testDirectory)){
			$this->_testDirectory = $testDirectory;	
		}else{
			throw new Exception('Invalid tests directory: '.$testDirectory);	
		}
	}
	
	public function addTest($testObject)
	{
		if($testObject instanceof Test){
			$this->_testCollection->add($testObject);
		}else{
			throw new Exception('Object not of type "Test"!');
		}
	}

	/**
	 * Return the current test directory
	 * 
	 * @return string $_testDirectory Test directory
	 */
	public function getTestDirectory()
	{
		return $this->_testDirectory;
	}
	//---------------------

	public function runTests()
	{
		echo "run ###########\n\n";
		// see if we have a collection
		
		if($this->_testCollection!=null){
			print_r($this->_testCollection);
			
			foreach($this->_testCollection as $test){
				echo 'test: '; print_r($test);
			}
		}else{
			// no collection, let's look in the tests directory
		}
	
	}
	
}
?>
