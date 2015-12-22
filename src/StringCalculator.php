<?php
class StringCalculator {
    const MAX_ALLOWED = 1000;

    public static function add($string) {
        $numbers = self::parseNumbers($string);

        return array_reduce($numbers, function ($sum, $number) {
            if ($number < 0) {
                throw new InvalidArgumentException("Invalid number: {$number}");
            }

            if ($number < self::MAX_ALLOWED) {
                $sum += $number;
            }

            return $sum;
        });
    }

    private static function parseNumbers($string) {
        return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $string));
    }
}
