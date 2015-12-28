<?php

class FizzBuzz {

    /**
     * Translates a number for the fizz buzz exercise
     * @param int $number
     * @return mixed
     */
    public function execute($number) {
        $translation = '';

        if ($number % 3 === 0) {
            $translation .= 'fizz';
        }

        if ($number % 5 === 0) {
            $translation .= 'buzz';
        }

        return empty($translation) ?  $number : $translation;
    }

    /**
     * Translates all numbers from one to $number
     * @param int $number
     * @return array
     */
    public function executeUpTo($number) {
        $translations = [];

        foreach (range(1, $number) as $number) {
            $translations[] = $this->execute($number);
        }

        return $translations;
    }
}
