<?php
class fizzbuzz
{
    function convert(int $number): String
    {
        $number_array = str_split(strval($number));
        $esta5 = in_array("5", $number_array);
        $esta3 = in_array("3",$number_array);
        if($number % 3 == 0 && $number % 5 == 0 || $esta3 && $esta5) {
            return "fizzbuzz";
        }
        elseif ($number % 3 == 0 || $esta3)
        {
            return "fizz";
        }
        elseif ($number % 5 == 0  || $esta5)
        {
            return "buzz";
        }
        else{
            return strval($number);
        }

    }
}


