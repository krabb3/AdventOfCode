<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */
$count = 0;
for($i = 171309; $i < 643603; $i++){
    $numberArr = str_split((string) $i);
    $lastChar = 0;
    $test1 = true;
    $test2 = false;
    for($j = 0, $jMax = count($numberArr); $j < $jMax; $j++){
        if($j === 0){
            $lastChar = 0;
        } else {
            $lastChar = (int)$numberArr[$j - 1];
        }
        if($lastChar > (int)$numberArr[$j]){
            $test1 = false;
            break;
        }
        if((int)$numberArr[$j] === $lastChar){
            $test2 = true;
        }
    }
    if($test1 && $test2){
        $count++;
    }
}
echo $count;
?>

<body style="background-color: black; color: white;"></body>
