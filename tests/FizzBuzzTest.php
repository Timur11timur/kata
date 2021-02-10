<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /** @test */
    public function fizzbuzz_returns_array()
    {
        $result = FizzBuzz::fizzbuzz();

        $this->assertEquals([], $result);
    }

    /** @test */
    public function fizzbuzz_1()
    {
        $result = FizzBuzz::fizzbuzz(1);

        $this->assertEquals([1], $result);
    }

    /** @test */
    public function fizzbuzz_2()
    {
        $result = FizzBuzz::fizzbuzz(2);

        $this->assertEquals([1, 2], $result);
    }

    /** @test */
    public function fizzbuzz_3()
    {
        $result = FizzBuzz::fizzbuzz(3);

        $this->assertEquals([1, 2, 'Fizz'], $result);
    }

    /** @test */
    public function fizzbuzz_5()
    {
        $result = FizzBuzz::fizzbuzz(5);

        $this->assertEquals([1, 2, 'Fizz', 4, 'Buzz'], $result);
    }

    /** @test */
    public function fizzbuzz_15()
    {
        $result = FizzBuzz::fizzbuzz(15);

        $this->assertEquals([1, 2, 'Fizz', 4, 'Buzz', 'Fizz', 7, 8, 'Fizz', 'Buzz', 11, 'Fizz', 13, 14, "FizzBuzz"], $result);
    }
}
