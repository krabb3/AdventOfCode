<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 10.04.2019
 * Time: 8:40 PM
 */
$input = file('input.txt');
$count = 0;
foreach ($input as $multiplication){
    $multiplication = explode('x', $multiplication);
    $multiplication[0] = (int) $multiplication[0];
    $multiplication[1] = (int) $multiplication[1];
    $multiplication[2] = (int) $multiplication[2];
    sort($multiplication);
    $count += $multiplication[0] * $multiplication[1] * $multiplication[2];
    $count += $multiplication[0] + $multiplication[0] + $multiplication[1] + $multiplication[1];
}
echo $count;