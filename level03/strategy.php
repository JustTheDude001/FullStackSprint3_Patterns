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
			$this->addStockDiscount = True;
		}
		
		public function deleteSeasonDiscount(){
			$this->isHighSeason = False;
		}
		public function deleteStockDiscount(){
			$this->addStockDiscount = False;
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
			$this->addStockDiscount = True;
		}
		
		public function deleteSeasonDiscount(){
			$this->isHighSeason = False;
		}
		public function deleteStockDiscount(){
			$this->addStockDiscount = False;
		}

	}
	
	// I am not sure if what I have done it was what was asked... But I tried ^^
	
	
	function test01(){
		$bmw01 = new bmwCouponGenerator();
		var_dump($bmw01->couponGenerator());
		$bmw01->addSeasonDiscount();
		var_dump($bmw01->couponGenerator());
		$bmw01->deleteSeasonDiscount();
		var_dump($bmw01->couponGenerator());
		$bmw01->addSeasonDiscount();
		$bmw01->addStockDiscount();
		var_dump($bmw01->couponGenerator());
		
		
		$mercedes01 = new mercedesCouponGenerator();
		var_dump($mercedes01->couponGenerator());
		$mercedes01->addSeasonDiscount();
		var_dump($mercedes01->couponGenerator());
		$mercedes01->deleteSeasonDiscount();
		var_dump($mercedes01->couponGenerator());
		$mercedes01->addSeasonDiscount();
		$mercedes01->addStockDiscount();
		var_dump($mercedes01->couponGenerator());
		
		
		
	}
	
	test01();
?>
