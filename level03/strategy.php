<?php
	
	interface carCouponGenerator{
		public function addSeasonDiscount();
		public function addStockDiscount();
		public function couponGenerator();
		// Not asked in the exercise but I think it is useful to have a way to delete the discounts...
		public function deleteSeasonDiscount();
		public function deleteStockDiscount();
	
	}
	class bmwCouponGenerator implements carCouponGenerator{
		
		public $isHighSeason = false;
		public $bigStock = true;
		
		public function couponGenerator() {
			$discount = 0;
			if(!$this->isHighSeason) {$discount += 5;}
			if($this->bigStock) {$discount += 7;}

			return $cupoun = "Get {$discount}% off the price of your new car.";
		}
		public function addSeasonDiscount(){
			$this->isHighSeason = True;
		}
		public function addStockDiscount(){
			$this->bigStock = True;
		}
		
		public function deleteSeasonDiscount(){
			$this->isHighSeason = False;
		}
		public function deleteStockDiscount(){
			$this->bigStock = False;
		}

	}
	
	class mercedesCouponGenerator implements carCouponGenerator{
	 
		public $isHighSeason = false;
		public $bigStock = true;
		
		public function couponGenerator(){
			$discount = 0;
			if(!$this->isHighSeason) {$discount += 4;}
			if($this->bigStock) {$discount += 10;}
			
			return $cupoun = "Get {$discount}% off the price of your new car.";	
		}
		
		public function addSeasonDiscount(){
			$this->isHighSeason = True;
		}
		public function addStockDiscount(){
			$this->bigStock = True;
		}
		
		public function deleteSeasonDiscount(){
			$this->isHighSeason = False;
		}
		public function deleteStockDiscount(){
			$this->bigStock = False;
		}

	}
	
	class couponGeneratorService_Context{
		private $carCouponGeneratorStrategy;
		
		
		function __construct(carCouponGenerator $strategy){
			$this->carCouponGeneratorStrategy = $strategy;
		}
		
		function setStrategy(carCouponGenerator $strategy){
			$this->carCouponGeneratorStrategy = $strategy;
		}
		
		public function addSeasonDiscount(){
			return $this->carCouponGeneratorStrategy->addSeasonDiscount();
		}
		public function addStockDiscount(){
			return $this->carCouponGeneratorStrategy->addStockDiscount();
		}
		
		public function deleteSeasonDiscount(){
			return $this->carCouponGeneratorStrategy->deleteSeasonDiscount();
		}
		public function deleteStockDiscount(){
			return $this->carCouponGeneratorStrategy->deleteStockDiscount();
		}
		public function couponGenerator(){
			return $this->carCouponGeneratorStrategy->couponGenerator();
		}
		
		
	
	}
	
	
	
	function test_strategy(){
		//Create a new object of couponGeneratorService
		$couponGeneratorServiceObj = new couponGeneratorService_Context(new bmwCouponGenerator());
		
		//Set the strategy for the couponGeneratorServiceObj
		$couponGeneratorServiceObj->setStrategy(new bmwCouponGenerator());
		
		//Process the coupon and print it
		var_dump($couponGeneratorServiceObj->couponGenerator());
		
		//Set both coupons and print result
		$couponGeneratorServiceObj->addSeasonDiscount();
		var_dump($couponGeneratorServiceObj->couponGenerator());
		$couponGeneratorServiceObj->deleteStockDiscount();
		var_dump($couponGeneratorServiceObj->couponGenerator());
		
		//As an strategy the object should be changeable in runtime:
		//Change bmw for mercedes and print
		//Set the strategy for the couponGeneratorServiceObj
		$couponGeneratorServiceObj->setStrategy(new mercedesCouponGenerator);
		var_dump($couponGeneratorServiceObj->couponGenerator());
		
		//Set both coupons and print result
		$couponGeneratorServiceObj->addSeasonDiscount();
		var_dump($couponGeneratorServiceObj->couponGenerator());
		$couponGeneratorServiceObj->deleteStockDiscount();
		var_dump($couponGeneratorServiceObj->couponGenerator());
		
		
		
		
	}
	
	// I am again not sure if what I have done it was what was asked... But I tried again ^^
	// I think at least now it is better than before...
	//Okay there was a mistake with the booleans names as well, I think it is already corrected
	
	test_strategy();
?>
