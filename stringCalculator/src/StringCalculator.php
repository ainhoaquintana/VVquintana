<?php

namespace Deg540\PHPTestingBoilerplate;

use SebastianBergmann\CliParser\RequiredOptionArgumentMissingException;
use function PHPUnit\Framework\isEmpty;

class StringCalculator
{

    public function add(string $valueString)
    {
        $sum = 0;
        $errors ="";
        $customizedSeparator = "";

        if(empty($valueString)){
            return strval($sum);
        }
        else {
            //GET THE NEW SEPARATOR IF THE STRING STARTS WITH "//"
            if ($valueString[0] == "/") {
                $customizedSeparatorIterator = 2;
                while ($valueString[$customizedSeparatorIterator] != "\n") {
                    $customizedSeparator .= $valueString[$customizedSeparatorIterator];
                    $customizedSeparatorIterator++;
                }
                $head = "//$customizedSeparator\n";
                $valueString = str_replace($head, "", $valueString);
            }

            $negativeNumbers="";
            $anterior = $valueString[0];
            for ($i = 1; $i < strlen($valueString); $i++) {
                //CHECK IF THERE IS A SEPARATOR NEAR ANOTHER
                if(!empty($customizedSeparator)){
                    if($valueString[$i] == $customizedSeparator and $anterior == $customizedSeparator){
                        $pos = strpos($valueString, $customizedSeparator);
                        $errors .= "Number expected but $customizedSeparator found at position $pos\n";
                    }
                }
                else {
                    if($valueString[$i] == "," and $anterior == ","){
                        //$pos = strpos($valueString, ",");
                        $errors .= "Number expected but ',' found at position $i\n";
                    }
                    if($valueString[$i] == "\n" and $anterior == "\n"){
                       // $pos = strpos($valueString, "\n");
                        $errors .= "Number expected but '\n' found at position $i\n";
                    }
                    if (($valueString[$i] == "," and $anterior == "\n") or ($valueString[$i] == "\n" and $anterior == ",")) {
                        $pos = strpos($valueString, "\n");
                        $errors .= "Number expected but '\n' found at position $pos\n";
                    }

                }
                $anterior = $valueString[$i];
            }


            //CHECK IF STRING ENDS WITH SEPARATOR
            if (str_ends_with($valueString, ",") or str_ends_with($valueString, "\n")) {
                $errors .= "Number expected but EOF found";
            }

           //SEPARATE THE STRING
            $separatedString = [];
            if (empty($customizedSeparator)) {
                $separatedString = preg_split('/(,|\n)/', $valueString);
            } else {
                //CHECK IF THERE IS A COMMA OR A NEWLINE WHEN THERE IS A CUSTOMIZED SEPARATOR
                if (str_contains($valueString, ",")) {
                    $commaPos = strpos($valueString, ",");
                    $errors .= "'$customizedSeparator' expected but ',' found in position $commaPos";
                } elseif (str_contains($valueString, "\n")) {
                    $newlinePos = strpos($valueString, "\n");
                    $errors .= "'$customizedSeparator' expected but '\n' found in position $newlinePos";

                } else {
                    $separatedString = explode($customizedSeparator, $valueString);
                }
            }

            //CHECK IF THE STRING CONTAINS NEGATIVE NUMBERS
            foreach($separatedString as $number){
                if(str_contains( $number, "-")){
                    $negativeNumbers .= " $number";
                }
            }
            if(!empty($negativeNumbers)){
                $errors .= "Negative not allowed :$negativeNumbers";
            }


            //RETURN THE ERRORS OR GET THE SUM
            if(!empty($errors)){
                return($errors);
            }
            else{
                foreach ($separatedString as $number) {
                    $sum = $sum + $number;
                }
                return (strval($sum));
            }

        }
    }
}