<?php

class BowlingGame {
    protected $rolls = [];

    /**
     * Roll a ball that knocs down $pins
     *
     * @param int $pins
     * @return void
     */
    public function roll($pins) {
        $this->rolls[] = $pins;
    }

    /**
     * Calculates the score for a full game
     *
     * @return int
     */
    public function score() {
        $score = 0;
        $roll = 0;

        for ($frames = 1; $frames <= 10; $frames++) {
            if ($this->isStrike($roll)) {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            } elseif ($this->isSpare($roll)) {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            } else {
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
                $roll += 2;
            }

        }

        return $score;
    }

    /**
     * Is it a strike?
     * @param int $roll
     * @return bool
     */
    private function isStrike($roll) {
        return $this->rolls[$roll] === 10;
    }

    /**
     * Is it a spare?
     * @param int $roll
     * @return bool
     */
    private function isSpare($roll) {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] === 10;
    }

    /**
     * Add the bonus for a spare
     * @param int $roll
     * @return int
     */
    private function spareBonus($roll) {
        return $this->rolls[$roll + 2];
    }

    /**
     * Add the bonus for a spare
     * @param int $roll
     * @return int
     */
    private function strikeBonus($roll) {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }
}
