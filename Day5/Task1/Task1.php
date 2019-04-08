<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */

ini_set('max_execution_time', 1200);
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$letters = str_split($input[0]);
$finished = false;

$i = 0;
while(!$finished){
    $lastLetter = $letters[0];

    foreach($letters as $l){
        $found = false;
        $finished2 = false;
        if(ctype_upper($l)){
            //UC
            if(lcfirst($l) === $lastLetter){
                //Same & LC
                $pos = strpos($input[0], $lastLetter.$l);
                $newInput = substr_replace($input[0], '', $pos, 2);
                $letters = str_split($newInput);
                break;
            }
        } else {
            //LC
            if(ucfirst($l) === $lastLetter){
                //Same & UC
                $pos = strpos($input[0], $lastLetter.$l);
                $newInput = substr_replace($input[0], '', $pos, 2);
                $letters = str_split($newInput);
                break;
            }
        }
        $finished2 = true;
        $output = implode('',$letters);
        $lastLetter = $l;
    }
    if($finished2){
        $finished = true;
    }
}
echo $output;
?>
<body style="background-color: black; color: white;"></body>
