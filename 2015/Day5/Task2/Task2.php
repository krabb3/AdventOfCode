<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 10.04.2019
 * Time: 8:40 PM
 */
$input = file('input.txt');

$count = 0;
//$chars = [];
foreach ($input as $word){

    $word = str_replace("\r\n", '', $word);
    $wordArr = str_split($word);

    $test1 = false;
    $test2 = false;
    for ($i = 0, $iMax = count($wordArr); $i < $iMax; $i++){
        if(substr_count($word, $wordArr[$i] . $wordArr[$i + 1], $i) > 1){
            $test1 = true;
        }
//        $chars[$word[$i]][$word[$i + 1]]++;
//        if($chars[$word[$i]][$word[$i + 1]] > 1){
//            $test1 = true;
//        }
        if($wordArr[$i] === $wordArr[$i + 2]){
            $test2 = true;
        }
    }
    if($test1 && $test2){
        $count++;
    }
//    unset($chars);
}
echo $count;