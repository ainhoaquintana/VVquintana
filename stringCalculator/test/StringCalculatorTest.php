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
    public function when_number_string_given_return_sum()
    {
        $calculatedValue = $this->stringCalculator->add("1.2, 2.4");
        $this->assertEquals("3.6",$calculatedValue);
    }

}