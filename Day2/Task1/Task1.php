<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 22.03.2019
 * Time: 5:18 PM
 */
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$doubles = 0;
$triples = 0;
foreach ($input as $letter){
    $letterArr = str_split($letter);
    $double = false;
    $triple = false;
    for($i = 0, $iMax = count($letterArr); $i < $iMax; $i++){
        $usedChars = [];
        if(in_array($letterArr[$i], $usedChars, true)){
            continue;
        }
        $search = array_keys($letterArr, $letterArr[$i]);
        if(count($search) === 2 && !$double){
            $usedChars[] = $letterArr[$i];
            $double = true;
            ++$doubles;
            continue;
        }
        if(count($search) === 3 && !$triple){
            $usedChars[] = $letterArr[$i];
            $triple = true;
            ++$triples;
            continue;
        }
        if($double && $triple){
            break;
        }
    }
}
echo $doubles * $triples;