<?php
class PrimeFactors {

    public static $factors = [];

    public function __construct($number) {
        $this->factors = [$number];
    }

    public function factor() {
        return $this->breakdown($this->factors);
    }

    private function breakdown(array $numbers) {
        foreach ($numbers as $number) {
            if ($this->isPrime($number)) {
                continue;
            }

            $try = 2;

            while ($try < $number) {
                if ($number % $try === 0) {
                    $this->factors = array_merge([$try], $this->breakdown([$number / $try]));
                }
                $try++;
            }

        }


        return $this->factors;
    }

    private function isPrime($factor = null) {
        $try = 2;

        while ($try < $factor) {
            if ($factor % $try  === 0) {
                return false;
            }
            $try++;
        }

        return true;
    }

}

$factor = new PrimeFactors(20);
$factors = $factor->factor();
var_dump($factors);