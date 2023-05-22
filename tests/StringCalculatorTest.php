<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\LinesOfCode\NegativeValueException;

class StringCalculatorTest extends TestCase
{

    public function test_add_numbers()
    {
        $this->assertEquals(4, (new StringCalculator)->add("1;3"));
    }

    public function test_empty_string_return_0()
    {
        $this->assertSame(0, (new StringCalculator)->add(""));
    }

    public function test_negative_number_should_throw_an_exception()
    {
        $this->expectException(NegativeValueException::class);

        (new StringCalculator)->add("-2,4");
    }

    public function test_numbers_greater_than_1000_are_ignored()
    {
        $this->assertEquals(1, (new StringCalculator)->add("1,1001"));

    }
}
