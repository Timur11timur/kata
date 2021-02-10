<?php

namespace App;

class FizzBuzz
{
    public static function fizzbuzz($number = 0): array
    {
        $result = [];

        if ($number > 0) {
            for ($i = 1; $i <= $number; $i++) {
                $item = $i;

                if ($i % 3 === 0) {
                    $item = 'Fizz';
                }

                if ($i % 5 === 0) {
                    if ($item === 'Fizz') {
                        $item = 'FizzBuzz';
                    } else {
                        $item = 'Buzz';
                    }
                }

                $result[] = $item;
            }
        }

        return $result;
    }
}