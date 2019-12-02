<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */


for($x = 1; $x < 100; $x++){
    for($y = 1; $y < 100; $y++) {
        $input = file_get_contents('input.txt');
        $input = explode(',', $input);
        $input[1] = $x;
        $input[2] = $y;

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
        if((int)$input[0] === 19690720){
            break 2;
        }
    }
}

echo $input[1] * 100 + $input[2];
?>
<body style="background-color: black; color: white;"></body>
