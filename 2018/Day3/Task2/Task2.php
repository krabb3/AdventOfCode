<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 05.04.2019
 * Time: 01:00 AM
 */
ini_set('memory_limit', '512M');
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$matrix = [];
$currentIds = [];
foreach ($input as $item){
    $id  = (int) substr($item, strpos($item, '#') + 1,  strpos($item, '@') - strpos($item, '#') - 2);
    $x = (int) substr($item, strpos($item, '@') + 2,  strpos($item, ',') - strpos($item, '@') - 2);
    $y = (int) substr($item, strpos($item, ',') + 1,  strpos($item, ':') - strpos($item, ',') - 1);
    $width = (int) substr($item, strpos($item, ':') + 2,  strpos($item, 'x') - strpos($item, ':') - 2);
    $height = (int) substr($item, strpos($item, 'x') + 1);
    $oneClaim = true;
    for($i = 1; $i <= $width; $i++){
        for($j = 1; $j <= $height; $j++){
            if(isset($matrix[$x + $i][$y + $j])){
                foreach($matrix[$x + $i][$y + $j] as $ma){
                    $currentIds[$ma] = false;
                }
                $oneClaim = false;
            }
            $matrix[$x + $i][$y + $j][] = $id;
        }
    }
    if($oneClaim){
        $currentIds[$id] = true;
    }
}
foreach($currentIds as $key => $item){
    if($item){
        echo $key;
    }
}
