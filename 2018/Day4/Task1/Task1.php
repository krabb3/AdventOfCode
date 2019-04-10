<?php
/**
 * Created by PhpStorm.
 * User: lkrebs
 * Date: 08.04.2019
 * Time: 7:00 PM
 */

$input = file('input.txt', FILE_IGNORE_NEW_LINES);
$guards = [];
sort($input);
$currentGuard = '';
foreach($input as $timePoint){
    $time  = substr($timePoint,1, 16);
    $event = substr($timePoint, 19);
    if(strpos($event, '#')){
        $currentGuard = str_replace(' begins shift', '', substr($event, strpos($event, '#') +1));
    }
    if(empty($currentGuard)){
        echo 'ERROR';
    }
    if($event === 'falls asleep'){
        $guards[$currentGuard][$time] = 0;
    }
    if($event === 'wakes up'){
        $guards[$currentGuard][$time] = 1;
    }
}
$guards2 = [];
foreach($guards as $guardId => $timestamps){
    foreach($timestamps as $timestamp => $value){
        if($value === 0){
            $start = $timestamp;
        } else{
            $start = DateTime::createFromFormat('Y-m-d H:i', $start);
            $end = DateTime::createFromFormat('Y-m-d H:i', $timestamp);
            $diff = $start->diff($end);
            $guards2[$guardId]['maxTime'] += $diff->i;
            for($i = 0;$i < $diff->i; $i++){
                if($i !== 0){
                    $start->add( date_interval_create_from_date_string('1 minute'));
                }
                $guards2[$guardId][$start->format('H:i')] ++;
            }
        }
    }
}

$longest = '';
$longestGuard = 0;
$longestTime = [];
foreach($guards2 as $guardId => $event){
    foreach($event as $time => $value){
        if($time === 'maxTime'){
            if($longest > $value){
                break;
            }
            unset($longestTime);
            $longest = $value;
            $longestGuard = $guardId;
        } else if($longestTime['highestTime'] < $value){
            $longestTime['highestTime'] = $value;
            $longestTime['mostTime'] = substr($time, 3);
        }
    }
}
echo $longestGuard * $longestTime['mostTime'];
?>
<body style="background-color: black; color: white;"></body>
