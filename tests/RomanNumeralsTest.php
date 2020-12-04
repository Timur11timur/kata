 <?php

 use App\RomanNumerals;
 use PHPUnit\Framework\TestCase;

 class RomanNumeralsTest extends TestCase
 {
     /**
      * @test
      * @dataProvider checks
      */
     public function it_generates_the_roman_numeral($number, $expected)
     {
         $this->assertEquals($expected, RomanNumerals::generate($number));
     }

     /**
      * @test
      */
     public function it_can_not_generate_roman_numeral_for_less_than_1()
     {
         $this->assertFalse(RomanNumerals::generate(0));
         $this->assertFalse(RomanNumerals::generate(-1));
     }

     /**
      * @test
      */
     public function it_can_not_generate_roman_numeral_for_more_than_3999()
     {
         $this->assertFalse(RomanNumerals::generate(4000));
     }

     public function checks()
     {
         return [
             [1, 'I'],
             [2, 'II'],
             [3, 'III'],
             [4, 'IV'],
             [5, 'V'],
             [6, 'VI'],
             [7, 'VII'],
             [8, 'VIII'],
             [9, 'IX'],
             [10, 'X'],
             [11, 'XI'],
             [14, 'XIV'],
             [15, 'XV'],
             [19, 'XIX'],
             [40, 'XL'],
             [50, 'L'],
             [90, 'XC'],
             [100, 'C'],
             [400, 'CD'],
             [500, 'D'],
             [900, 'CM'],
             [1000, 'M'],
             [3999, 'MMMCMXCIX'],
             [1825, 'MDCCCXXV'],
         ];
     }
 }
