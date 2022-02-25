<?php

namespace Deg540\PHPTestingBoilerplate;

use function PHPUnit\Framework\isEmpty;

class StringCalculator
{

    public function add(string $valueString)
    {
        $sum = 0;
        $separatedString = explode (",", $valueString);
        foreach ($separatedString as $i)
        {
            $sum =  $sum + floatval($i);
        }
        return (strval($sum));
    }
}