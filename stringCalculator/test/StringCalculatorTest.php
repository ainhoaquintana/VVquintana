<?php

namespace Deg540\PHPTestingBoilerplate\Test;

use PHPUnit\Framework\TestCase;
use Deg540\PHPTestingBoilerplate\StringCalculator;

class StringCalculatorTest extends TestCase
{
    private StringCalculator $stringCalculator;

    /**
     * @setup
     */
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->stringCalculator = new StringCalculator(); //Asi lo declaramos fuera de los test para no declarar lo mismo en cada test
    }

    /**
     * @test
     */
    public function when_String_given_return_String()
    {
        $calculatedValue = $this->stringCalculator->add("1");
        $this->assertIsString($calculatedValue);
    }

    /**
     * @test
     */
    public function when_empty_string_given_return_0()
    {
        $calculatedValue = $this->stringCalculator->add("");
        $this->assertEquals("0",$calculatedValue);
    }

    /**
     * @test
     */
    public function when_one_nomber_given_return_it()
    {
        $calculatedValue = $this->stringCalculator->add("999");
        $this->assertEquals("999",$calculatedValue);
    }

    /**
     * @test
     */
    public function when_two_number_string_given_return_sum()
    {
        $calculatedValue = $this->stringCalculator->add("3.8, 7.2");
        $this->assertEquals("11",$calculatedValue);
    }

    /**
     * @test
     */
    public function when_many_number_string_given_return_sum()
    {
        $calculatedValue = $this->stringCalculator->add("3.8, 7.2, 8.3, 6.2, 1.5");
        $this->assertEquals("27",$calculatedValue);
    }

    /**
     * @test
     */
    public function use_newline_as_separator()
    {
        $calculatedValue = $this->stringCalculator->add("1\n 2, 3");
        $this->assertEquals("6",$calculatedValue);
    }

    /**
     * @test
     */
    public function when_comma_is_next_to_newline_throw_error()
    {
        $calculatedValue = $this->stringCalculator->add("1\n, 2, 3");
        $this->assertStringContainsString("Number expected but '\n' found at position", $calculatedValue);
    }

    /**
     * @test
     */
    public function when_input_ends_in_separator_throw_error()
    {
        $calculatedValue = $this->stringCalculator->add("1\n 2, 3,");
        $this->assertEquals("Number expected but EOF found", $calculatedValue);
    }

    /**
     * @test
     */
    public function when_customized_separator_added_separate_with_it()
    {
        $calculatedValue = $this->stringCalculator->add("//sep\n1sep2sep2.2");
        $this->assertEquals("5.2", $calculatedValue);
    }

    /**
     * @test
     */
    public function when_customized_separator_added_dont_separate_with_others()
    {
        $calculatedValue = $this->stringCalculator->add("//|\n1|2,3");
        $this->assertEquals("'|' expected but ',' found in position 3", $calculatedValue);
    }

    /**
     * @test
     */
    public function when_negative_number_in_string_return_error()
    {
        $calculatedValue = $this->stringCalculator->add("3,-4.1,-3");
        $this->assertStringContainsString("Negative not allowed : -4.1 -3", $calculatedValue);
    }

    /**
     * @test
     */
    public function when_multiple_errors_happen_return_all_of_them()
    {
        $calculatedValue = $this->stringCalculator->add("3,,-4.1,-3");
        $this->assertEquals("Number expected but ',' found at position 2\nNegative not allowed : -4.1 -3", $calculatedValue);
    }

}
