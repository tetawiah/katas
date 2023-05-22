<?php

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /**
         @dataProvider number
     */
    public function test_generate_roman_numeral_for($number, $expected)
    {

        $this->assertEquals($expected, RomanNumerals::generate($number));
    }

    public function test_cannot_generate_roman_numeral_for_0() {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    public static function number()
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
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100,'C']
        ];
    }
}
