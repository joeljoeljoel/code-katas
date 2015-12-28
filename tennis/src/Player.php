<?php
class Player {
    public $name;
    public $points;

    public function __construct($name, $points) {
        $this->name = $name;
        $this->points = $points;
    }

    public function awardPoints($points) {
        $this->points = $points;
    }
}
