<?php

class BowlingGameTest extends \PHPUnit_Framework_TestCase {
    protected function setUp() {
    }

    protected function tearDown() {
    }

    public function test_it_scores_zero_for_a_gutter_game() {
        $bowlingGame = new BowlingGame();
        $this->rollTimes($bowlingGame, 0, 20);

        $this->assertEquals(0, $bowlingGame->score());
    }

    public function test_it_scores_20_for_rolling_all_ones() {
        $bowlingGame = new BowlingGame();

        $this->rollTimes($bowlingGame, 1, 20);

        $this->assertEquals(20, $bowlingGame->score());
    }

    public function test_it_scores_one_spare() {
        $bowlingGame = new BowlingGame();

        $this->rollSpare($bowlingGame);
        $bowlingGame->roll(4);

        $this->rollTimes($bowlingGame, 1, 17);

        $this->assertEquals(35, $bowlingGame->score());
    }

    public function test_it_scores_one_strike() {
        $bowlingGame = new BowlingGame();

        $this->rollStrike($bowlingGame);
        $bowlingGame->roll(3);
        $bowlingGame->roll(4);

        $this->rollTimes($bowlingGame, 1, 16);

        $this->assertEquals(40, $bowlingGame->score());
    }

    public function test_it_scores_one_strike_and_one_spare() {
        $bowlingGame = new BowlingGame();

        $this->rollStrike($bowlingGame);
        $this->rollSpare($bowlingGame);

        $this->rollTimes($bowlingGame, 1, 16);

        $this->assertEquals(47, $bowlingGame->score());
    }

    public function test_it_scores_300_for_a_perfect_game() {
        $bowlingGame = new BowlingGame();
        $this->rollTimes($bowlingGame, 10, 12);

        $this->assertEquals(300, $bowlingGame->score());
    }

    private function rollSpare(BowlingGame $bowlingGame) {
        $bowlingGame->roll(5);
        $bowlingGame->roll(5);
    }

    private function rollStrike(BowlingGame $bowlingGame) {
        $bowlingGame->roll(10);
    }

    private function rollTimes(BowlingGame $bowlingGame, $pins, $times) {
        for ($i = 0; $i < $times; $i++) {
            $bowlingGame->roll($pins);
        }
    }
}
