<?php

class FizzBuzzTest extends \PHPUnit_Framework_TestCase {
    protected function setUp() {
        $this->fizzbuzz = new FizzBuzz();
    }

    protected function tearDown() {
    }

    // tests
    public function test_it_translates_1() {
        $this->assertEquals(1, $this->fizzbuzz->execute(1));
    }

    public function test_it_translates_2() {
        $this->assertEquals(2, $this->fizzbuzz->execute(2));
    }

    public function test_it_translates_3() {
        $this->assertEquals('fizz', $this->fizzbuzz->execute(3));
    }

    public function test_it_translates_4() {
        $this->assertEquals(4, $this->fizzbuzz->execute(4));
    }

    public function test_it_translates_5() {
        $this->assertEquals('buzz', $this->fizzbuzz->execute(5));
    }

    public function test_it_translates_6() {
        $this->assertEquals('fizz', $this->fizzbuzz->execute(6));
    }

    public function test_it_translates_12() {
        $this->assertEquals('fizz', $this->fizzbuzz->execute(12));
    }

    public function test_it_translates_15() {
        $this->assertEquals('fizzbuzz', $this->fizzbuzz->execute(15));
    }

    public function test_it_translates_a_series_of_numbers() {
        $this->assertEquals([1, 2, 'fizz', 4, 'buzz'], $this->fizzbuzz->executeUpTo(5));
    }

    public function test_it_translates_a_series_of_numbers_up_to_10() {
        $this->assertEquals([1, 2, 'fizz', 4, 'buzz', 'fizz', 7, 8, 'fizz', 'buzz'], $this->fizzbuzz->executeUpTo(10));
    }
}
