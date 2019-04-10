<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 05.04.2019
 * Time: 7:01 PM
 */
//Make new aufgabe falsch verstanden
$input = file('input.txt', FILE_IGNORE_NEW_LINES);

$letterArrArr = [];
foreach ($input as $letter){
    $letterArr = str_split($letter);
    $letterArrArr[] =  $letterArr;
}
$solutionLetters = '';

//With this code you would get the letters of the first two letterarrays which share all the same letters but one
//for($i = 0, $iMax = count($letterArrArr); $i < $iMax; $i++){
//    for($k = 0, $kMax = count($letterArrArr); $k < $kMax; $k++){
//        if($i === $k || $k < $i){
//            continue;
//        }
//        $wrongCount = 0;
//        if($solutionLetters !== ''){
//            break 2;
//        }
//        $tmpArray = $letterArrArr[$k];
//        $tmpArrayStr = implode('', $tmpArray);
//        for($j = 0, $jMax = count($letterArrArr[$i]); $j < $jMax; $j++){
//            $letterPos = strpos($tmpArrayStr, $letterArrArr[$i][$j]);
//            if(is_numeric($letterPos)){
//                $solutionLetters .= $letterArrArr[$i][$j];
//                $tmpArray[$letterPos] = ' ';
//                $tmpArrayStr = implode('', $tmpArray);
//            } else {
//                ++$wrongCount;
//            }
//            if($wrongCount > 1){
//                $solutionLetters = '';
//                break;
//            }
//        }
//    }
//}

for($i = 0, $iMax = count($letterArrArr); $i < $iMax; $i++){
    for($k = 0, $kMax = count($letterArrArr); $k < $kMax; $k++){
        if($i === $k || $k < $i){
            continue;
        }
        $wrongCount = 0;
        if($solutionLetters !== ''){
            break 2;
        }
        $tmpArray = $letterArrArr[$k];
        for($j = 0, $jMax = count($letterArrArr[$i]); $j < $jMax; $j++){
            if($letterArrArr[$i][$j] === $tmpArray[$j]){
                $solutionLetters .= $letterArrArr[$i][$j];
            } else {
                ++$wrongCount;
            }
            if($wrongCount > 1){
                $solutionLetters = '';
                break;
            }
        }
    }
}

echo $solutionLetters;