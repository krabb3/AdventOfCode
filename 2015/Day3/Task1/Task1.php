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
   $count += min(array($multiplication[0] * $multiplication[1], $multiplication[0] * $multiplication[2], $multiplication[1] * $multiplication[2]));
   $count += (2 * $multiplication[0] * $multiplication[1]) + (2 * $multiplication[0] * $multiplication[2]) + (2 * $multiplication[1] * $multiplication[2]);
}
echo $count;