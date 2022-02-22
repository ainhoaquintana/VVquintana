<?php

namespace Deg540\PHPTestingBoilerplate;

class PrimeFactors
{
    public function generate($number):array
    {
        $factors = [];
        $divisor = 2;
        while ($number > 1) {
            while ($number % $divisor == 0) {
                $factors[]= $divisor;
                $number = $number / $divisor;
            }
            $divisor++;
        }

        return $factors;
    }
}