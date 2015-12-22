<?php

class StringCalculatorTest extends \PHPUnit_Framework_TestCase {
    protected function setUp() {
    }

    protected function tearDown() {
    }

    // tests
    public function test_we_can_instatiate_it() {
        $stringCalculator = new StringCalculator();
    }

    public function test_it_calculates_zero_when_empty_string_passed_in() {
        $result = StringCalculator::add('');
        $this->assertEquals(0, $result);
    }

    public function test_it_calculates_a_single_number() {
        $result = StringCalculator::add('3');
        $this->assertEquals(3, $result);
    }

    public function test_it_calculates_two_numbers() {
        $result = StringCalculator::add('3,4');
        $this->assertEquals(7, $result);
    }

    public function test_it_ignores_non_numeric_entries() {
        $result = StringCalculator::add('3,4,F,G,A,W');
        $this->assertEquals(7, $result);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Invalid number: -5
     */
    public function test_it_disallows_negative_numbers() {
        $result = StringCalculator::add('5,5,-5');
    }

    public function test_it_ignores_numbers_greater_than_1000() {
        $result = StringCalculator::add('10, 100, 1000');
        $this->assertEquals(110, $result);
    }

    public function test_it_accepts_new_line_characters_as_a_delimiter() {
        $result = StringCalculator::add('2\n 3, 3');
        $this->assertEquals(8, $result);
    }
}
