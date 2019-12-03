<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 9:00 PM
 */


$input = file('input.txt');
$line1 = explode(',', $input[0]);
$line2 = explode(',', $input[1]);
$field = [];
$points = [];
$x = 0;
$y = 0;
foreach($line1 as $line){
    if(strpos($line, 'L') === 0){
        $length = substr($line, 1);
        for($i = 0; $i < $length; $i++){
            $x--;
            if (!isset($field[$x][$y])) {
                $field[$x][$y]++;
            }
        }
    } elseif(strpos($line, 'R') === 0){
        $length = substr($line, 1);
        for($i = 0; $i < $length; $i++){
            $x++;
            if (!isset($field[$x][$y])) {
                $field[$x][$y]++;
            }
        }
    } elseif(strpos($line, 'U') === 0){
        $length = substr($line, 1);
        for($i = 0; $i < $length; $i++){
            $y++;
            if (!isset($field[$x][$y])) {
                $field[$x][$y]++;
            }
        }
    } elseif(strpos($line, 'D') === 0){
        $length = substr($line, 1);
        for($i = 0; $i < $length; $i++){
            $y--;
            if (!isset($field[$x][$y])) {
                $field[$x][$y]++;
            }
        }
    }
}
$x = 0;
$y = 0;
foreach($line2 as $line) {
    if (strpos($line, 'L') === 0) {
        $length = substr($line, 1);
        for ($i = 0; $i < $length; $i++) {
            $x--;
            if ($field[$x][$y]) {
                $points[] = ['x' => $x, 'y' => $y];
            }
        }
    } elseif (strpos($line, 'R') === 0) {
        $length = substr($line, 1);
        for ($i = 0; $i < $length; $i++) {
            $x++;
            if ($field[$x][$y]) {
                $points[] = ['x' => $x, 'y' => $y];
            }
        }
    } elseif (strpos($line, 'U') === 0) {
        $length = substr($line, 1);
        for ($i = 0; $i < $length; $i++) {
            $y++;
            if ($field[$x][$y]) {
                $points[] = ['x' => $x, 'y' => $y];
            }
        }
    } elseif (strpos($line, 'D') === 0) {
        $length = substr($line, 1);
        for ($i = 0; $i < $length; $i++) {
            $y--;
            if ($field[$x][$y]) {
                $points[] = ['x' => $x, 'y' => $y];
            }
        }
    }

}
$shortestDistance = PHP_INT_MAX;
foreach($points as $point){
    $temp = abs($point['x']) + abs($point['y']);
    if($temp < $shortestDistance){
        $shortestDistance = $temp;
    }
}
echo $shortestDistance;
?>

<body style="background-color: black; color: white;"></body>
