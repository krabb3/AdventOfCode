<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 10.04.2019
 * Time: 8:40 PM
 */
$input = 'iwrupvqb';
$found = false;
$x = 0;
while (!$found){
    ++$x;
    if(substr( md5($input . $x), 0, 5) === '00000'){
        echo $x;
        break;
    }
}