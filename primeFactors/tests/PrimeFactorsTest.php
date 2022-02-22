<?php

namespace Deg540\PHPTestingBoilerplate\Test;

use PHPUnit\Framework\TestCase;
use Deg540\PHPTestingBoilerplate\PrimeFactors;

class PrimeFactorsTest extends TestCase
{

    private PrimeFactors $primefactors;
    /**
     * @setup
     */
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->primefactors = new PrimeFactors(); //Asi lo declaramos fuera de los test para no declarar lo mismo en cada test
    }

    /**
     * @test
     */
    public function when_2_given_return_2()
    {
        $convertedValue = $this->primefactors->generate(2);

        $this->assertEquals([2], $convertedValue);
    }

    /**
     * @test
     */
    public function when_3_given_return_3()
    {
        $convertedValue = $this->primefactors->generate(3);

        $this->assertEquals([3], $convertedValue);
    }

    /**
     * @test
     */
    public function when_4_given_return_2_2()
    {
        $convertedValue = $this->primefactors->generate(4);

        $this->assertEquals([2,2], $convertedValue);
    }

    /**
     * @test
     */
    public function when_100_given_return_2_2_5_5()
    {
        $convertedValue = $this->primefactors->generate(100);

        $this->assertEquals([2,2,5,5], $convertedValue);
    }
}
