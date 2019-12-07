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
for ($i = 0, $iMax = count($input); $i < $iMax; $i++) {
    $code = $input[$i];
    $codeArr = str_split((string)$code);
    $codeArrSize = count($codeArr);
    if ($codeArrSize === 1) {
        $opCode = (int)$codeArr[0];
        $firstParam = 0;
        $secondParam = 0;
    } elseif ($codeArrSize === 2) {
        $opCode = (int)($codeArr[$codeArrSize - 2] . $codeArr[$codeArrSize - 1]);
        $firstParam = 0;
        $secondParam = 0;
    } elseif ($codeArrSize === 3) {
        $opCode = (int)($codeArr[$codeArrSize - 2] . $codeArr[$codeArrSize - 1]);
        $firstParam = (int)$codeArr[$codeArrSize - 3];
        $secondParam = 0;
    } elseif ($codeArrSize === 4) {
        $opCode = (int)($codeArr[$codeArrSize - 2] . $codeArr[$codeArrSize - 1]);
        $firstParam = (int)$codeArr[$codeArrSize - 3];
        $secondParam = (int)$codeArr[$codeArrSize - 4];
    }
    if ($codeArrSize > 4) {
        $thirdParam = (int)$codeArr[$codeArrSize - 5];
    } else {
        $thirdParam = 0;
    }
    if ($firstParam === 1) {
        $number1 = $input[$i + 1];
    } else {
        $number1 = $input[$input[$i + 1] ?? null] ?? null;
    }
    if ($secondParam === 1) {
        $number2 = $input[$i + 2];
    } else {
        $number2 = $input[$input[$i + 2] ?? null] ?? null;
    }
    $position = $input[$i + 3] ?? null;
    if ($opCode === 1) {
        $input[$position] = $number1 + $number2;
        $i += 3;
        continue;
    }
    if ($opCode === 2) {
        $input[$position] = $number1 * $number2;
        $i += 3;
        continue;
    }
    if ($opCode === 3) {
        $position = $input[$i + 1];
        $input[$position] = $id;
        ++$i;
        continue;
    }
    if ($opCode === 4) {
        $position = $input[$input[$i + 1]];
        echo $position, '<br />';
        ++$i;
        continue;
    }
    if ($opCode === 5){
        if($firstParam === 0){
            $value = $input[$i + 1];
        } else {
            $value = $i + 1;
        }
        if($value !== 0){
            $i = $value - 1;
        } else {
            $i += 3;
        }
    }
    if ($opCode === 6){
        if($firstParam === 0){
            $value = $input[$input[$i + 1]];
        } else {
            $value = $input[$i + 1];
        }
        if($value !== 0){
            $i = $value - 1;
        } else {
            $i += 3;
        }
    }
    break;
}
//echo $input[0];
?>
<body style="background-color: black; color: white;"></body>
