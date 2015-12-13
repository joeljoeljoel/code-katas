<?php
class PrimeFactors {

    /**
     * @param $number
     * @return array
     */
    public function generate($number) {
        $primes = [];

        for ($divisor = 2; $number > 1; $divisor++)
        {
            for (; $number % $divisor === 0; $number /= $divisor)
            {
                $primes[] = $divisor;;
            }
        }

        return $primes;
    }
}
