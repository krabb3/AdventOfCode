<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */


//Faster Version I think
$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$output = 0;
$fuel = 0;
foreach($input as $value){
    $fuel = ((int) ($value / 3)) - 2;
    $output += $fuel;
    while($fuel > 0){
        $fuel = ((int) ($fuel / 3)) - 2;
        if($fuel > 0){
            $output += $fuel;
        }
    }
}
echo $output;
?>
<body style="background-color: black; color: white;"></body>
