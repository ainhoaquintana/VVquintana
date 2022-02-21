<?php

namespace Deg540\PHPTestingBoilerplate\Test;

use PHPUnit\Framework\TestCase;

class FizzbuzzTest  extends TestCase
{
    /**
     * @test
     */
    public function when_3_given_convert_to_fizz()
    {
        $fizzbuzz = new fizzbuzz();
        $convertedValue = $fizzbuzz->convert(3);
        $this->assertEquals("fizz", $convertedValue);
    }

    /**
     * @test
     */
    public function when_5_given_convert_to_buzz()
    {
        $fizzbuzz = new fizzbuzz();
        $convertedValue = $fizzbuzz->convert(5);
        $this->assertEquals("buzz", $convertedValue);
    }
    /**
     * @test
     */
    public function when_15_given_convert_to_fizzbuzz()
    {
        $fizzbuzz = new fizzbuzz();
        $convertedValue = $fizzbuzz->convert(15);
        $this->assertEquals("fizzbuzz", $convertedValue);
    }

}