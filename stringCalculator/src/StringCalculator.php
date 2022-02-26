<?php

namespace Deg540\PHPTestingBoilerplate;

use function PHPUnit\Framework\isEmpty;

class StringCalculator
{

    public function add(string $valueString)
    {
        $sum = 0;
        $customizedSeparator = "";

        //GET THE NEW SEPARATOR IF THE STRING STARTS WITH "//"
        if($valueString[0]=="/") {
            $customizedSeparatorIterator = 2;
            while($valueString[$customizedSeparatorIterator] != "\n") {
                $customizedSeparator .= $valueString[$customizedSeparatorIterator];
                $customizedSeparatorIterator++;
            }
            $head = "//$customizedSeparator\n";
            $valueString = str_replace($head, "", $valueString);
        }

        //CHECK IF THERE IS A SEPARATOR NEAR ANOTHER
        $anterior = $valueString[0];
        for($i = 1; $i <  strlen($valueString); $i++) {
            if(($valueString[$i] == "," and $anterior == "\n") or ($valueString[$i] == "\n" and $anterior == ",")){
                $pos = strpos($valueString, "\n");
                return ("Number expected but '\n' found at position $pos");
            }
            $anterior = $valueString[$i];

        }

        //CHECK IF STRING ENDS WITH SEPARATOR
        if(str_ends_with($valueString, ",") or str_ends_with($valueString, "\n")) {
            return("Number expected but EOF found");
        }

        //GET THE SUM OF THE STRING
        if (empty($customizedSeparator)) {
            $separatedString = preg_split('/(,|\n)/', $valueString);
        }
        else {
            //CHECK IF THERE IS A COMMA OR A NEWLINE WHEN THERE IS A CUSTOMIZED SEPARATOR
            if(str_contains($valueString, ",")) {
                $commaPos = strpos($valueString, ",");
                return("'$customizedSeparator' expected but ',' found in position $commaPos");
            }
            elseif(str_contains($valueString, "\n")) {
                $newlinePos = strpos($valueString, "\n");
                return("'$customizedSeparator' expected but '\n' found in position $newlinePos");
            }
            else {
                $separatedString = explode($customizedSeparator, $valueString);
            }
        }
        foreach ($separatedString as $j) {
            $sum = $sum + floatval($j);
        }
        return (strval($sum));

    }
}