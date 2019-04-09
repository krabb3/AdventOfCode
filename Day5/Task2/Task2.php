<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 09.04.2019
 * Time: 9:00 PM
 */

//THIS WORKS BUT IS WAY TO SLOW
//ini_set('max_execution_time', 2000);
//$input = file_get_contents('input.txt');
//$chars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
//$minChars = 0;
//foreach($chars as $c){
//    $round = $input;
//    $round = str_replace(array($c, ucfirst($c)), '', $round);
//    $finished = false;
//    while(!$finished){
//        $lastLetter = $round[0];
//
//        $first = true;
//        for ($i = 0, $iMax = strlen($round); $i < $iMax; $i++){
//            if($first){
//                $first = false;
//                continue;
//            }
//            $finished = false;
//            if(ctype_upper($round[$i])){
//                //UC
//                if(lcfirst($round[$i]) === $lastLetter){
//                    //Same & LC
//                    $pos = strpos($round, $lastLetter.$round[$i]);
//                    $round = substr_replace($round, '', $pos, 2);
//                    break;
//                }
//            } else {
//                //LC
//                if(ucfirst($round[$i]) === $lastLetter){
//                    //Same & UC
//                    $pos = strpos($round, $lastLetter.$round[$i]);
//                    $round = substr_replace($round, '', $pos, 2);
//                    break;
//                }
//            }
//            $finished = true;
//            $lastLetter = $round[$i];
//        }
//    }
//    if($minChars > strlen($round)){
//        $minChars = strlen($round);
//    }
//}
//
//echo $minChars;

//REGEX for this (.)(?!\1)(?i:\1)

ini_set('max_execution_time', 2000);
$input = file_get_contents('input.txt');
$chars = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
$minChars = 1000000;
foreach($chars as $c){
    $round = $input;
    $round = str_replace(array($c, ucfirst($c)), '', $round);
    $finished = false;
    while(!$finished){
        $pattern = '/(.)(?!\1)(?i:\1)/';
        $round2 = preg_replace($pattern, '', $round, 1);
        if($round2 === $round) {
           $finished = true;
        }
        $round = $round2;
    }
    if($minChars > strlen($round)){
        $minChars = strlen($round);
    }
}

echo $minChars;
?>

<body style="background-color: black; color: white;"></body>
