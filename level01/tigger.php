<?php

class Tigger {

	private static $instances = [];
	private static $roarsTimes;
	
	protected function __construct() {
		echo "Building character..." . PHP_EOL;
	}
	
	protected function __clone(){}
	
	public function __wakeup(){
		throw new \Exception("Cannot unserialize a singleton!");
	}
	
	

	public static function getInstance(){
		$cls = static::class;
		if (!isset(self::$instances[$cls])) {
			self::$instances[$cls] = new static();
			self::$roarsTimes = 0;
		}

		return self::$instances[$cls];
	}
	
	public function roar() {
		echo "Grrr!" . PHP_EOL;
		self::$roarsTimes++;
	}
	
	public function getCounter() {
		echo self::$roarsTimes, "\n";
	}

}

function clientCode()
{
    $s1 = Tigger::getInstance();
    $s2 = Tigger::getInstance();
    if ($s1 === $s2) {
        echo "Singleton works, both variables contain the same instance.";
    } else {
        echo "Singleton failed, variables contain different instances.";
    }
}


function testRoars(){
	
	$s1 = Tigger::getInstance();
    $s2 = Tigger::getInstance();
    
    $s1->getCounter();
    $s2->getCounter();
    $s1->roar();
    
    
    $s2->roar();
    $s1->getCounter();
    $s2->getCounter();
    $s2->roar();
    $s1->getCounter();
    $s2->getCounter();
    
    
	
}


clientCode();
testRoars();




?>
