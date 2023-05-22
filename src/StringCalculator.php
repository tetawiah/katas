<?php

namespace App;

use SebastianBergmann\LinesOfCode\NegativeValueException;

class StringCalculator
{
    const MAX_NUM_ALLOWED = 1000;

    public function add(string $param)
    {

        $numbers = preg_split('/[,\n;]/', $param);

        $this->disallowNegatives($numbers);

        return array_sum($this->lessthan1000($numbers));
    }

    public function disallowNegatives(array $numbers)
    {
        if (preg_grep('/^-\d+$/', $numbers)) {
            throw new NegativeValueException('Only positive numbers allowed');
        }

    }

    public function lessthan1000($numbers)
    {

        return array_filter($numbers, fn($number) => $number <= SELF::MAX_NUM_ALLOWED);
    }
}
