<?php

class primeFactors
{
    public function generate ($number){
        $factors = [];
        $divisor = 2;
        while($number>1) {
            while ($number % $divisor == 0) {
                $factors = $divisor;
                $number = $number / $divisor;
            }
            $divisor++;
        }

        return $factors;
    }
}