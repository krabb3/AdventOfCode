<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */


$input = file_get_contents('input.txt');
$input = explode(',', $input);
$id = 1;
/** @noinspection ForeachInvariantsInspection */
for($i = 0, $iMax = count($input); $i < $iMax; $i++){
    $code = $input[$i];
    $codeArr = str_split($code);
    $codeArrSize = count($codeArr);
    $opCode = (int) ($codeArr[$codeArrSize - 2] . $codeArr[$codeArrSize - 1]);
    $firstParam = $codeArr[$codeArrSize - 3];
    $secondParam = $codeArr[$codeArrSize - 4];
    if($codeArrSize > 4){
        $thirdParam = $codeArr[$codeArrSize - 5];
    } else {
        $thirdParam = 0;
    }

    $number1 = $input[$input[$i + 1]];
    if($firstParam === 1){
        $number1 = $input[$i + 1];
    }
    $number2 = $input[$input[$i + 2]];
    if($secondParam === 1){
        $number2 = $input[$i + 2];
    }
    $position = $input[$i + 3];
    if ($opCode === 1) {
        $input[$position] = $number1 + $number2;
        $i += 3;
        continue;
    }
    if($opCode === 2) {
        $input[$position] = $number1 * $number2;
        $i += 3;
        continue;
    }
    if($opCode === 3) {
        $position = $input[$i + 1];
        $input[$position] = $id;
        ++$i;
        continue;
    }
    if($opCode === 4) {
        $position = $input[$i + 1];
        echo $input[$position];
        ++$i;
        continue;
    }
    break;
}
//echo $input[0];
?>
<body style="background-color: black; color: white;"></body>
