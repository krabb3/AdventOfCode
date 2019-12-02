<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */


$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$output = 0;
foreach($input as $value){
    $output += ((int) ($value / 3)) - 2;
}
echo $output;
?>
<body style="background-color: black; color: white;"></body>
