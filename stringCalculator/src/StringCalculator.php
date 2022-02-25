<?php

namespace Deg540\PHPTestingBoilerplate;

use function PHPUnit\Framework\isEmpty;

class StringCalculator
{

    public function add(string $valueString)
    {
        $sum = 0;
        for($i = 0; $i < strlen($valueString); $i++)
        {
            if(($valueString[$i] == "," && $valueString[$i+1] == "\n")||($valueString[$i] == "\n" && $valueString[$i+1] == ","))
            {
                $pos = strpos($valueString, "\n");
                return ("Number expected but '\n' found at position $pos");
            }
        }
        $separatedString = preg_split('/(,|\n)/', $valueString);
        foreach ($separatedString as $j)
        {
            $sum =  $sum + floatval($j);
        }
        return (strval($sum));
    }
}