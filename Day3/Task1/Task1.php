<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 05.04.2019
 * Time: 01:00 AM
 */

$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$matrix = [];
$number = 0;
foreach ($input as $item){
    $x = (int) substr($item, strpos($item, '@') + 2,  strpos($item, ',') - strpos($item, '@') - 2);
    $y = (int) substr($item, strpos($item, ',') + 1,  strpos($item, ':') - strpos($item, ',') - 1);
    $width = (int) substr($item, strpos($item, ':') + 2,  strpos($item, 'x') - strpos($item, ':') - 2);
    $height = (int) substr($item, strpos($item, 'x') + 1);
    for($i = 1; $i <= $height; $i++){
        for($j = 1; $j <= $width; $j++){
            if(isset($matrix[$x + $i][$y + $j]) && $matrix[$x + $i][$y + $j] > 1) {
                continue;
            }
            if(isset($matrix[$x + $i][$y + $j]) && $matrix[$x + $i][$y + $j] > 0) {
                ++$number;
                ++$matrix[$x + $i][$y + $j];
                continue;
            }
            ++$matrix[$x + $i][$y + $j];
        }
    }
}
echo $number;
