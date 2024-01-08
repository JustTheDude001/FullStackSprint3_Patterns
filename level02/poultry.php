<?php

class Duck {

       public function quack() {
              echo "Quack \n";
       }

       public function fly() {
              echo "I'm flying \n";
       }
}

class Turkey {

       public function gobble() {
              echo "Gobble gobble \n";
       }

       public function fly() {
       echo "I'm flying a short distance \n";
       }
}

class TurkeyAdapter extends Duck{
	
	private $adaptee;
	
	public function __construct(Turkey $adaptee){
		$this->adaptee = $adaptee;
	}
	
	public function quack(){
		return $this->adaptee->gobble();
	}
	
	public function fly(){
		$this->adaptee->fly();
		$this->adaptee->fly();
		$this->adaptee->fly();
		$this->adaptee->fly();
		$this->adaptee->fly();
		
	}
	

}



function test(){
	
	function duck_interaction($duck) {
       $duck->quack();
       $duck->fly();
	}

	$duck = new Duck;
	$turkey = new Turkey;
	$turkey_adapter = new TurkeyAdapter($turkey);
	
	echo "The Turkey says...\n";
	$turkey->gobble();
	$turkey->fly();
	echo "The Duck says...\n";
	
	duck_interaction($duck);
	echo "The TurkeyAdapter says...\n";
	duck_interaction($turkey_adapter);
	
}

test();

?>
