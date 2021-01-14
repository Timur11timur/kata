<?php

namespace App;

class StringCalculator
{
    private const MAX_NUMBER_ALLOWED = 1000;

    private string $delimiter = ",|\n";

    public function add(string $numbers): int
    {
        $numbers = $this->parseString($numbers);

        $this->disallowNegatives($numbers);

        $numbers = $this->ignoreMaxNumber($numbers);

        return array_sum($numbers);
    }

    private function ignoreMaxNumber(array $numbers): array
    {
        $numbers = array_filter($numbers, function ($number) {
            return $number <= self::MAX_NUMBER_ALLOWED;
        });

        return $numbers;
    }

    private function disallowNegatives(array $numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new \Exception('Negative numbers are disallowed.');
            }
        }
    }

    private function parseString(string $numbers): array
    {
        $customDelimiter = '\/\/(.)\n';

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        $numbers = preg_split("/{$this->delimiter}/", $numbers);

        return $numbers;
    }
}