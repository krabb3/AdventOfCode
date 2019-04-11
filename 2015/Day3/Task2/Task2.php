<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 10.04.2019
 * Time: 8:40 PM
 */
$input = file('input.txt');
$input = str_split($input[0]);

$currentX = 0;
$currentY = 0;

$currentX2 = 0;
$currentY2 = 0;

$x = 0;

$houses[$currentX][$currentY] = 1;
$count = 1;
foreach ($input as $direction){
    if($x % 2 === 0){
        switch ($direction){
            case '^':
                ++$currentX;
                if(!isset($houses[$currentX][$currentY])){
                    $count++;
                }
                ++$houses[$currentX][$currentY];
                break;
            case '>':
                ++$currentY;
                if(!isset($houses[$currentX][$currentY])){
                    $count++;
                }
                ++$houses[$currentX][$currentY];
                break;
            case 'v':
                --$currentX;
                if(!isset($houses[$currentX][$currentY])){
                    $count++;
                }
                ++$houses[$currentX][$currentY];
                break;
            case '<':
                --$currentY;
                if(!isset($houses[$currentX][$currentY])){
                    $count++;
                }
                ++$houses[$currentX][$currentY];
                break;
            default:
                die('ERROR');
                break;
        }
    } else {
        switch ($direction){
            case '^':
                ++$currentX2;
                if(!isset($houses[$currentX2][$currentY2])){
                    $count++;
                }
                ++$houses[$currentX2][$currentY2];
                break;
            case '>':
                ++$currentY2;
                if(!isset($houses[$currentX2][$currentY2])){
                    $count++;
                }
                ++$houses[$currentX2][$currentY2];
                break;
            case 'v':
                --$currentX2;
                if(!isset($houses[$currentX2][$currentY2])){
                    $count++;
                }
                ++$houses[$currentX2][$currentY2];
                break;
            case '<':
                --$currentY2;
                if(!isset($houses[$currentX2][$currentY2])){
                    $count++;
                }
                ++$houses[$currentX2][$currentY2];
                break;
            default:
                die('ERROR');
                break;
        }
    }
    ++$x;
}
echo $count;