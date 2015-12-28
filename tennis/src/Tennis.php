<?php
// 1-0 => Fifteen-Love
// 2-0 => Thirty-Love
// 3-0 => Forty-Love
// 4-0 => Winner
// 4-3 => Advantage Player 1
// 5-3 => Winner
// 4-4 => Deuce

// 1-1 => Fifteen-All
// 2-2 => Thirty-All

class Tennis {
    public $player1;
    public $player2;

    public function __construct(Player $player1, Player $player2) {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score() {
        if ($this->gameIsWon()) {
            return 'Winner-' . $this->getLeader();
        }

        if ($this->gameIsDeuce()) {
            return 'Deuce';
        }

        if ($this->gameIsInAdvantage()) {
            return 'Advantage-' . $this->getLeader();
        }

        $score = $this->translatePoints($this->player1->points) . '-';

        if ($this->gameIsTied()) {
            return $score .= 'All';
        } else {
            $score .= $this->translatePoints($this->player2->points);
        }

        return $score;
    }

    private function translatePoints($points) {
        switch ($points) {
            case 3:
                return 'Forty';
                break;

            case 2:
                return 'Thirty';
                break;

            case 1:
                return 'Fifteen';
                break;

            default:
                return 'Love';
                break;
        }
    }

    private function gameIsWon() {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByAtLeastTwo();
    }

    public function isLeadingByAtLeastTwo() {
        return abs($this->player1->points - $this->player2->points) > 1;
    }

    public function isLeadingByOne() {
        return abs($this->player1->points - $this->player2->points) === 1;
    }

    public function hasEnoughPointsToBeWon() {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    private function gameIsInAdvantage() {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByOne();
    }

    private function gameIsDeuce() {
        return $this->hasEnoughPointsToBeWon() && $this->gameIsTied();
    }

    private function gameIsTied() {
        return $this->player1->points === $this->player2->points;
    }

    private function getLeader() {
        if ($this->player1->points > $this->player2->points) {
            return $this->player1->name;
        }

        return $this->player2->name;
    }

}
