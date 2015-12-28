<?php

class TennisTest extends \PHPUnit_Framework_TestCase {
    protected function setUp() {
        $this->john = new Player('John', 0);
        $this->jane = new Player('Jane', 0);
        $this->tennis = new Tennis($this->john, $this->jane);
    }

    protected function tearDown() {
    }

    // tests

    public function test_it_scores_love_for_no_score() {

        $this->assertEquals('Love-All', $this->tennis->score());
    }

    public function test_it_scores_a_one_zero_game() {
        $this->john->awardPoints(1);
        $this->assertEquals('Fifteen-Love', $this->tennis->score());
    }

    public function test_it_scores_a_two_zero_game() {
        $this->john->awardPoints(2);
        $this->assertEquals('Thirty-Love', $this->tennis->score());
    }

    public function test_it_scores_a_zero_two_game() {
        $this->jane->awardPoints(2);
        $this->assertEquals('Love-Thirty', $this->tennis->score());
    }

    public function test_it_scores_a_two_two_game() {
        $this->john->awardPoints(2);
        $this->jane->awardPoints(2);
        $this->assertEquals('Thirty-All', $this->tennis->score());
    }

    public function test_it_scores_a_three_zero_game() {
        $this->john->awardPoints(3);
        $this->assertEquals('Forty-Love', $this->tennis->score());
    }

    public function test_it_scores_a_four_zero_game() {
        $this->john->awardPoints(4);
        $this->assertEquals('Winner-John', $this->tennis->score());
    }

    public function test_it_scores_a_zero_four_game() {
        $this->jane->awardPoints(4);
        $this->assertEquals('Winner-Jane', $this->tennis->score());
    }

    public function test_it_scores_a_two_four_game() {
        $this->john->awardPoints(2);
        $this->jane->awardPoints(4);
        $this->assertEquals('Winner-Jane', $this->tennis->score());
    }

    public function test_it_scores_an_advantage() {
        $this->john->awardPoints(4);
        $this->jane->awardPoints(3);
        $this->assertEquals('Advantage-John', $this->tennis->score());
    }

    public function test_it_scores_a_deuce() {
        $this->john->awardPoints(4);
        $this->jane->awardPoints(4);
        $this->assertEquals('Deuce', $this->tennis->score());
    }

    public function test_it_scores_a_nine_nine_game() {
        $this->john->awardPoints(9);
        $this->jane->awardPoints(9);
        $this->assertEquals('Deuce', $this->tennis->score());
    }

    public function test_it_scores_a_high_score_win() {
        $this->john->awardPoints(4);
        $this->jane->awardPoints(6);
        $this->assertEquals('Winner-Jane', $this->tennis->score());
    }
}
