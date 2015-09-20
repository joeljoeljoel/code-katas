<?php
class PrimeFactors {

    public $factors;

    public static function factor($number) {
        return self::isPrime($number);
    }

    private static function isPrime($factor = null) {
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