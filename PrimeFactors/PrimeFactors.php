<?php
class PrimeFactors {

    public $factors = [];

    public function factor($number) {
        return $this->breakdown($number);
    }

    private function breakdown($number) {
        if ($this->isPrime($number)) {
            $this->factors[] = $number;
            return $this->factors;
        }

        $try = 2;

        while ($try < $number) {
            if ($number % $try === 0) {
                $this->factors[] = $try;
                return $this->breakdown($number / $try);
            }
            $try++;
        }
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

$factor = new PrimeFactors();
$factors = $factor->factor(48733432);
echo '[' . implode($factors, ', ') . ']' . PHP_EOL;