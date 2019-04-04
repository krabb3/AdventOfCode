<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 22.03.2019
 * Time: 5:18 PM
 */
ini_set('max_execution_time', 60);
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$frequency = 0;
$frequencies = [];
$found = false;
do {
    foreach ($input as $number){
        $frequencies[] = $frequency;
        if (strpos($number, '+') === 0){
            $frequency += substr($number, 1);
        } else {
            $frequency -= substr($number, 1);
        }
        if(in_array($frequency, $frequencies, true) === true){
            $found = true;
            break;
        }
    }
} while (!$found);

echo $frequency;