<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */

//THIS WORKS BUT IS WAY TO SLOW

//ini_set('max_execution_time', 2000);
//$input = file('input.txt', FILE_IGNORE_NEW_LINES);
//$letters = str_split($input[0]);
//$finished = false;
//
//$i = 0;
//while(!$finished){
//    $lastLetter = $letters[0];
//
//    $first = true;
//    foreach($letters as $l){
//        if($first){
//            $first = false;
//            continue;
//        }
//        $finished = false;
//        if(ctype_upper($l)){
//            //UC
//            if(lcfirst($l) === $lastLetter){
//                //Same & LC
//                $pos = strpos($input[0], $lastLetter.$l);
//                $input[0] = substr_replace($input[0], '', $pos, 2);
//                $letters = str_split($input[0]);
//                break;
//            }
//        } else {
//            //LC
//            if(ucfirst($l) === $lastLetter){
//                //Same & UC
//                $pos = strpos($input[0], $lastLetter.$l);
//                $input[0] = substr_replace($input[0], '', $pos, 2);
//                $letters = str_split($input[0]);
//                break;
//            }
//        }
//        $finished = true;
//        $output = implode('',$letters);
//        $lastLetter = $l;
//    }
//}
//echo strlen($output);


//Faster Version I think
ini_set('max_execution_time', 2000);
$input = file_get_contents('input.txt');
$finished = false;

while(!$finished){
    $lastLetter = $input[0];

    $first = true;
    for ($i = 0, $iMax = strlen($input); $i < $iMax; $i++){
        if($first){
            $first = false;
            continue;
        }
        $finished = false;
        if(ctype_upper($input[$i])){
            //UC
            if(lcfirst($input[$i]) === $lastLetter){
                //Same & LC
                $pos = strpos($input, $lastLetter.$input[$i]);
                $input = substr_replace($input, '', $pos, 2);
                break;
            }
        } else {
            //LC
            if(ucfirst($input[$i]) === $lastLetter){
                //Same & UC
                $pos = strpos($input, $lastLetter.$input[$i]);
                $input = substr_replace($input, '', $pos, 2);
                break;
            }
        }
        $finished = true;
        $lastLetter = $input[$i];
    }
}
echo strlen($input);
?>
<body style="background-color: black; color: white;"></body>
