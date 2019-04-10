<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 22.03.2019
 * Time: 5:18 PM
 */
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$frequency = 0;
foreach ($input as $number){
    if (strpos($number, '+') === 0){
        $frequency += substr($number, 1);
    } else {
        $frequency -= substr($number, 1);
    }

}
echo $frequency;