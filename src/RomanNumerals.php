<?php

namespace App;

class RomanNumerals
{
    const NUMERALS = [
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];

    public static function generate($num)
    {
        $result = '';
        if ($num == 0) {
            return false;
        }
        foreach (static::NUMERALS as $numeral => $numForm) {
            for (; $num >= $numForm; $num -= $numForm) {
                $result .= $numeral;
            }
        }

        return $result;
    }
}
