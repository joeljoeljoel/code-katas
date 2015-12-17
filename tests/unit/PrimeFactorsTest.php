<?php

class PrimeFactorsTest extends \PHPUnit_Framework_TestCase {
    protected function setUp() {
    }

    protected function tearDown() {
    }

    // tests
    public function testItReturnsAnEmptyArrayFor1() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([], $primeFactors->generate(1));
    }

    public function testItReturns2For2() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([2], $primeFactors->generate(2));
    }

    public function testItReturns3For3() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([3], $primeFactors->generate(3));
    }

    public function testItReturns22For4() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([2, 2], $primeFactors->generate(4));
    }

    public function testItReturns5For5() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([5], $primeFactors->generate(5));
    }

    public function testItReturns23For6() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([2, 3], $primeFactors->generate(6));
    }

    public function testItReturns222For8() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([2, 2, 2], $primeFactors->generate(8));
    }

    public function testItReturns33For9() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([3, 3], $primeFactors->generate(9));
    }

    public function testItReturns2255For100() {
        $primeFactors = new PrimeFactors();
        $this->assertEquals([2, 2, 5, 5], $primeFactors->generate(100));
    }
}
