<?php

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase {
    
    /**
     @dataProvider factors
     */
    function test_generate_prime_factors_for_1($number,$expected) {
        $factors = (new PrimeFactors)->generate($number);
        $this->assertEquals($expected,$factors);
    }

    public static function factors() {
        return [
            [1,[]],
            [2,[2]],
            [3,[3]],
            [4,[2,2]],
            [6,[2,3]],
            [8,[2,2,2]],
            [9,[3,3]],
            [100,[2,2,5,5]],
        ];
    }
}