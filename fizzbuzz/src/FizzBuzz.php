<?php

class FizzBuzz {
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

    public function executeUpTo($number) {
        $translations = [];

        foreach (range(1, $number) as $number) {
            $translations[] = $this->execute($number);
        }

        return $translations;
    }
}
