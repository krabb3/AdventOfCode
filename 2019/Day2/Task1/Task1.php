<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */


$input = file_get_contents('input.txt');
$input = explode(',', $input);
/** @noinspection ForeachInvariantsInspection */
for($i = 0, $iMax = count($input); $i < $iMax; $i++){
    $number1 = $input[$input[$i + 1]];
    $number2 = $input[$input[$i + 2]];
    $position = $input[$i + 3];
    if ((int)$input[$i] === 1) {
        $input[$position] = $number1 + $number2;
        $i += 3;
        continue;
    }
    if((int)$input[$i] === 2) {
        $input[$position] = $number1 * $number2;
        $i += 3;
        continue;
    }
    break;
}
echo $input[0];
?>
<body style="background-color: black; color: white;"></body>
