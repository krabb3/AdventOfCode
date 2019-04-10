<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 10.04.2019
 * Time: 8:40 PM
 */
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$input = str_split($input[0]);
$floor = 0;
foreach ($input as $key => $parenthesis){
   if($parenthesis === '('){
       ++$floor;
   } else {
       --$floor;
   }
   if($floor === -1){
       echo $key + 1;
       break;
   }
}