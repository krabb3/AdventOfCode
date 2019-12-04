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
$steps = 0;
foreach($line1 as $line){
    if(strpos($line, 'L') === 0){
        $length = substr($line, 1);
        for($i = 0; $i < $length; $i++){
            $x--;
            $steps++;
            if (!isset($field[$x][$y])) {
                $field[$x][$y]['steps'] = $steps;
                $field[$x][$y]++;
            }
        }
    } elseif(strpos($line, 'R') === 0){
        $length = substr($line, 1);
        for($i = 0; $i < $length; $i++){
            $x++;
            $steps++;
            if (!isset($field[$x][$y])) {
                $field[$x][$y]['steps'] = $steps;
                $field[$x][$y]++;
            }
        }
    } elseif(strpos($line, 'U') === 0){
        $length = substr($line, 1);
        for($i = 0; $i < $length; $i++){
            $y++;
            $steps++;
            if (!isset($field[$x][$y])) {
                $field[$x][$y]['steps'] = $steps;
                $field[$x][$y]++;
            }
        }
    } elseif(strpos($line, 'D') === 0){
        $length = substr($line, 1);
        for($i = 0; $i < $length; $i++){
            $y--;
            $steps++;
            if (!isset($field[$x][$y])) {
                $field[$x][$y]['steps'] = $steps;
                $field[$x][$y]++;
            }
        }
    }
}
$x = 0;
$y = 0;
$steps = 0;
foreach($line2 as $line) {
    if (strpos($line, 'L') === 0) {
        $length = substr($line, 1);
        for ($i = 0; $i < $length; $i++) {
            $x--;
            $steps++;
            if ($field[$x][$y]) {
                $points[] = ['x' => $x, 'y' => $y, 'steps' => $steps + $field[$x][$y]['steps']];
            }
        }
    } elseif (strpos($line, 'R') === 0) {
        $length = substr($line, 1);
        for ($i = 0; $i < $length; $i++) {
            $x++;
            $steps++;
            if ($field[$x][$y]) {
                $points[] = ['x' => $x, 'y' => $y, 'steps' => $steps + $field[$x][$y]['steps']];
            }
        }
    } elseif (strpos($line, 'U') === 0) {
        $length = substr($line, 1);
        for ($i = 0; $i < $length; $i++) {
            $y++;
            $steps++;
            if ($field[$x][$y]) {
                $points[] = ['x' => $x, 'y' => $y, 'steps' => $steps + $field[$x][$y]['steps']];
            }
        }
    } elseif (strpos($line, 'D') === 0) {
        $length = substr($line, 1);
        for ($i = 0; $i < $length; $i++) {
            $y--;
            $steps++;
            if ($field[$x][$y]) {
                $points[] = ['x' => $x, 'y' => $y, 'steps' => $steps + $field[$x][$y]['steps']];
            }
        }
    }

}
$shortestDistance = PHP_INT_MAX;
foreach($points as $point){
    $temp = $point['steps'];
    if($temp < $shortestDistance){
        $shortestDistance = $temp;
    }
}
echo $shortestDistance;
?>

<body style="background-color: black; color: white;"></body>
